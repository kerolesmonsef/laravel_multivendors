@extends('admin::layout.master')

<?php
/** @var \App\Models\Language $language */
if ($language->exists) {
    $form_action = route('admin.language.update', ['language' => $language->id]);
    $form_method = "PUT";
    $form_submit = "تعديل";
} else {
    $form_action = route('admin.language.store');
    $form_method = "POST";
    $form_submit = "حفظ";
}

?>
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
                                    <a href="{{route('admin.language.index')}}"> أللغات </a>
                                </li>
                                <li class="breadcrumb-item active">إضافة لغة

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
                                    <h4 class="card-title" id="basic-layout-form"> إضافة لغة </h4>
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
                                                <h4 class="form-section"><i class="ft-home"></i> بيانات الجمعية </h4>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label > اسم اللغة </label>
                                                            <input type="text" value="{{ old("name",$language->name) }}"
                                                                   class="form-control"
                                                                   placeholder="ادخل اسم اللغة  "
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label > الاختصار </label>
                                                            <input type="text"
                                                                   value="{{ old("short_cut",$language->short_cut) }}"
                                                                   class="form-control"
                                                                   placeholder="ادخل اختصار اللغة     "
                                                                   name="short_cut">

                                                            @error("short_cut")
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label > الاتجاة </label>
                                                            <select name="direction" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر اتجاه اللغة ">
                                                                    <option value="rtl">من اليمين الي اليسار
                                                                    </option>
                                                                    <option value="ltr">من اليسار الي اليمين
                                                                    </option>
                                                                </optgroup>
                                                            </select>
                                                            @error("direction")
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
                                                                {{ old('active',$language->active) == 'yes' ? "checked" : '' }}/>
                                                            <label
                                                                   class="card-title ml-1">الحالة </label>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-actions">
                                                    <button type="button" class="btn btn-warning mr-1"
                                                            onclick="history.back();">
                                                        <i class="ft-x"></i> تراجع
                                                    </button>
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



