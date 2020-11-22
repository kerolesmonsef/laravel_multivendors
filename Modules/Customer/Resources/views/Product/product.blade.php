@extends('customer::layouts.master')

@section('content')
    <div id="main" dir="rtl">
        <div class="container">
            <div class="row">
                <div class="nov-row  col-lg-12 col-xs-12">
                    <div class="nov-row-wrap row">
                        <div class="nov-html col-xl-3 col-lg-3 col-md-3">
                            <div class="block">
                                <div class="block_content">

                                </div>
                            </div>
                        </div>

                        <div class="slider-wrapper theme-default col-xl-9 col-lg-9 col-md-9 col-md-12">
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <h1>{{ $product->name }}</h1><br>
                                    <p>{{ $product->details }}</p><br>
                                    <h4>
                                        {{ $product->price }}$
                                    </h4>

                                    <div>
                                        <h1>Bye this Product Using </h1>
                                        <br>
                                        <br>
                                        <br>
                                        @foreach($product->merchant->payment_types as $payment_type)
                                            <a class="btn btn-success"
                                               href="{{ route("customer.product.buy",['payment_type'=>$payment_type->pivot->id,"product"=>$product->id]) }}">
                                                <i class="fas fa-money-bell"></i>
                                                {{ $payment_type->name }}
                                            </a>
                                        @endforeach
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <img src="{{ show_image($product->image) }}" class="img-responsive"
                                         style="width: 100%">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
