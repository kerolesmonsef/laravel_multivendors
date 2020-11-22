@extends('admin::layout.master')

<?php
/** @var $merchant_payment */
if ($merchant_payment->exists) {
    $form_action = route('admin.merchant_payment_type.update', ['merchant_payment' => $merchant_payment->id]);
    $form_method = "PUT";
    $form_submit = "Update";
} else {
    /** @var $merchant */
    $form_action = route('admin.merchant_payment_type.store', $merchant->id);
    $form_method = "POST";
    $form_submit = "Save";
}
$merchant = $merchant ?? $merchant_payment->merchant;

?>


@section('content')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4  >{{ $form_submit ." ". $merchant->user->name ." Payment " }} </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{ $form_action }}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method($form_method)
                                            <div class="form-body">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label> Payment Email </label>
                                                            <input type="text"
                                                                   value="{{ old("payment_email",$merchant_payment->payment_email) }}"
                                                                   class="form-control"
                                                                   name="payment_email">
                                                            @error("payment_email")
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label> payment key </label>
                                                            <input type="text"
                                                                   value="{{ old("payment_key",$merchant_payment->payment_key) }}"
                                                                   class="form-control"
                                                                   name="payment_key">

                                                            @error("payment_key")
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label> payment_secret </label>
                                                            <input type="text"
                                                                   value="{{ old("payment_secret",$merchant_payment->payment_secret) }}"
                                                                   class="form-control"
                                                                   name="payment_secret">

                                                            @error("payment_secret")
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label> payment type </label>
                                                            <select class="form-control" name="payment_type_id">
                                                                @foreach( \App\Models\PaymentType::all() as $paymentType)
                                                                    <option
                                                                        value="{{ $paymentType->id }}"
                                                                        {{ old('payment_type_id',$merchant_payment->payment_type_id)==$paymentType->id ? "selected":"" }}
                                                                    >
                                                                        {{ $paymentType->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            @error("payment_type_id")
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-actions">

                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> {{ $form_submit }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@endsection



