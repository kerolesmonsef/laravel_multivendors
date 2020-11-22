<?php

use App\Models\PaymentType;

use App\Payments\Types\Paypal;
use App\Payments\Types\Stripe;
use App\Payments\Types\Weaccept;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentType::create([
            'name' => "Paypal",
            'class_path' => Paypal::class,
        ]);

        PaymentType::create([
            'name' => "Weaccept",
            'class_path' => Weaccept::class,
        ]);

        PaymentType::create([
            'name' => "Stripe",
            'class_path' => Stripe::class,
        ]);
    }
}
