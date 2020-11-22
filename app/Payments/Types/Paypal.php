<?php


namespace App\Payments\Types;


use App\Models\MerchantPaymentType;
use App\Models\Product;
use App\Payments\IPayment;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;


class Paypal extends IPayment
{
    private $client_id;
    private $client_secret;
    private $appContext;

    public function __construct(Product $product, MerchantPaymentType $paymentType)
    {
        parent::__construct($product, $paymentType);
        $this->client_id = $paymentType->payment_key;
        $this->client_secret = $paymentType->payment_secret;

        $this->appContext = new ApiContext(new OAuthTokenCredential($this->client_id, $this->client_secret));
        $this->appContext->setConfig(config('paypal.settings'));
    }

    public function getFormUrl()
    {
        $total_price = $this->product->price;

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $itemList = new ItemList();


        $item = new Item();
        $item->setName($this->product->name)
            ->setCurrency("USD")
            ->setQuantity(1)
            ->setSku($this->product->id)
            ->setPrice($this->product->price);

        $itemList->addItem($item);


        $amount = new Amount();
        $amount
            ->setCurrency("USD")
            ->setTotal($total_price);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment Paypal")
            ->setInvoiceNumber(uniqid("", TRUE));

        $redirectUrl = new RedirectUrls();
        $redirectUrl
            ->setReturnUrl(route('customer.payment.success', [
                'product' => $this->product->id,
                'payment_type' => $this->paymentType,
                'type' => 'paypal'
            ]))
            ->setCancelUrl(route('customer.payment.fail', 'paypal'));

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrl)
            ->setTransactions([$transaction]);

        try {
            $payment->create($this->appContext);
        } catch (PayPalConnectionException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
        $payment_link = $payment->getApprovalLink();

        return ($payment_link);
    }

    public function success(array $parameters = [])
    {
        $payment = Payment::get(request('paymentId'), $this->appContext);
        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));

        try {
            $result = $payment->execute($execution, $this->appContext);
        } catch (PayPalConnectionException  $e) {
            dump($e->getData(), ($e->getCode()));
            dd('');
        }

        $this->product->update([
            'quantity' => $this->product->quantity - 1,
        ]);
        if ($result->getState() == 'approved') {
            return redirect()->route('customer.product.show', $this->product->id)->with("s_alert_success","you have successfully purchased this Product");
        }
        dump("error");
        dump($result);
    }

    public function fail()
    {

    }
}
