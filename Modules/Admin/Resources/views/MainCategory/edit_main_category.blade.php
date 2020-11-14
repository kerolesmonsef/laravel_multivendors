@extends('admin::layout.master')


@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href=""> الاقسام الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active"> تعديل - {{$main_category->name}}
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
                                    <h4 class="card-title" id="basic-layout-form"> تعديل قسم رئيسي </h4>
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
                                        <form class="form"
                                              action="{{ route('admin.main_category.update',$main_category->id) }}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('put')

                                            <input name="id" value="{{$main_category->id}}" type="hidden">


                                            <div class="form-group">
                                                <div class="text-center">
                                                    <img
                                                        src="{{asset($main_category->photo)}}"
                                                        class="height-150" alt="صورة القسم  ">
                                                </div>
                                            </div>


                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i> بيانات القسم </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>slug</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('slug',$main_category->slug)}}"
                                                                   name="slug">
                                                            @error("slug")
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>photo</label>
                                                            <input type="file"
                                                                   class="form-control"
                                                                   name="photo">
                                                            @error("photo")
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <?php
                                                /** @var \App\Models\MainCategory $main_category */
                                                /** @var \Illuminate\Database\Eloquent\Collection $show_languages */
                                                $show_languages = $main_category->languages;
                                                $languages = \App\Models\Language::all();
                                                $languages->each(function ($lang) use (&$show_languages){
                                                    $new = $show_languages->where('id',$lang->id)->first();
                                                    if (is_null($new)){
                                                        $show_languages[]=$lang;
                                                    }
                                                });
//                                                dd($languages, $show_languages);
                                                ?>
                                                @foreach($show_languages as $lang)
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label> اسم القسم-
                                                                    {{ $lang->name }} - </label>
                                                                <input type="text"
                                                                       class="form-control"
                                                                       name="category[{{$loop->index}}][name]"
                                                                       value="{{ old("category.$loop->index.name",$lang->pivot->content ?? "") }}"
                                                                >
                                                                @error("category.$loop->index.name")
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6 hidden">
                                                            <div class="form-group">
                                                                <label> اللغة {{ $lang->name }}</label>
                                                                <input type="number" id="abbr"
                                                                       readonly
                                                                       class="form-control"
                                                                       value="{{ $lang->id }}"
                                                                       name="category[{{$loop->index}}][language_id]">

                                                                @error("category.$loop->index.language_id")
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>

                                                @endforeach

                                            </div>


                                            <div class="form-actions">

                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> تحديث
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



