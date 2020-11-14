@extends('admin::layout.master')

<?php
//dump($errors);
/** @var \App\Models\merchant $merchant */
if ($merchant->exists) {
    $form_action = route('admin.merchant.update', ['merchant' => $merchant->id]);
    $form_method = "PUT";
    $form_submit = "تعديل";
} else {
    $form_action = route('admin.merchant.store');
    $form_method = "POST";
    $form_submit = "حفظ";
}

?>

@push('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
@endpush
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.merchant.index')}}"> التجار </a>
                                </li>
                                <li class="breadcrumb-item active">إضافة تاجر

                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> إضافة تاجر </h4>
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
                                                <h4 class="form-section"><i class="ft-home"></i> بيانات التاجر</h4>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label> اسم التاجر </label>
                                                            <input type="text" value="{{ old("name",$user->name) }}"
                                                                   class="form-control"
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label> الاميل </label>
                                                            <input type="text"
                                                                   value="{{ old("email",$user->email) }}"
                                                                   class="form-control"
                                                                   name="email">

                                                            @error("email")
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label> رقم الهاتف </label>
                                                            <input type="text"
                                                                   value="{{ old("mobile",$user->mobile) }}"
                                                                   class="form-control"
                                                                   name="mobile">

                                                            @error("mobile")
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label> الرقم السري </label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="password">

                                                            @error("password")
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label> الشعار </label>
                                                            <input type="file"
                                                                   class="form-control"
                                                                   name="logo">
                                                            @error("logo")
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        @component('GeneralComponents.inputLabelOnBorder')
                                                            @slot('l_name','Location')
                                                            @slot('icon','fa-map-marked-alt')
                                                            @slot('icon2','fa-street-view')
                                                            @slot('other')
                                                                <?php
                                                                $latitude = old('latitude', $merchant->latitude) ?? 30;
                                                                $longitude = old('longitude', $merchant->longitude) ?? 29;
                                                                ?>
                                                                <div class="form-control border-0">
                                                                    <input type="hidden" class="lat_input_class"
                                                                           name="latitude"
                                                                           value="{{ $latitude }}">
                                                                    <input type="hidden" class="long_input_class"
                                                                           name="longitude"
                                                                           value="{{ $longitude }}">
                                                                    <div class="badge badge-dark">
                                                                        Latitude : <span
                                                                            class="lat_label_class">{{ round($latitude,5) }}</span>
                                                                    </div>
                                                                    <div class="badge badge-dark ">
                                                                        Longitude : <span
                                                                            class="long_label_class">{{ round($longitude,5) }}</span>
                                                                    </div>
                                                                    @component('GeneralComponents.locationPopUpMap')
                                                                        @slot('button_class','btn btn-info btn-sm pt-0 pb-0')
                                                                        @slot('button_title','Select Location <i class="fas fa-map-marker-alt"></i>')
                                                                        @slot('mark_lat',$latitude)
                                                                        @slot('mark_long',$longitude)
                                                                        @slot('mark_title',$merchant->name)
                                                                    @endcomponent
                                                                </div>
                                                            @endslot
                                                        @endcomponent
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <label>القسم</label>
                                                            <select class="from-control" name="category_id">
                                                                <optgroup label="اختر القسم">
                                                                    @foreach(auth()->user()->main_categories() as $category)
                                                                        <option
                                                                            value="{{ $category->id }}"
                                                                            {{ $merchant->category_id == $category->id ? "selected" : "" }}>
                                                                            {{ $category->languages->first()->pivot->content ?? "" }}
                                                                        </option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                            @error("category_id")
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <label class="card-title ml-1">العنوان </label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   value="{{ old('address',$merchant->address) }}"
                                                                   name="address"/>
                                                            @error("address")
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">


                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" name="active"

                                                                   class="switchery" data-color="success"
                                                                {{ old('active',$merchant->active) == 'yes' ? "checked" : '' }}/>
                                                            <label
                                                                class="card-title ml-1">الحالة </label>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-actions">

                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> {{ $form_submit }}
                                                    </button>
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



