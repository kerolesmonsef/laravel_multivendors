@extends('admin::layout.master')



@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> الاقسام الرئيسية </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> ألمتاجر
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">جميع المتاجر </h4>
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
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th>الاسم</th>
                                                <th> اللوجو</th>
                                                <th>الهاتف</th>
                                                <th>القسم الرئيسي</th>
                                                <th> ألحالة</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($merchants as $merchant)
                                                <tr>
                                                    <td>{{ $merchant->user->name }}</td>
                                                    <td><img style="width: 150px; height: 100px;"
                                                             src="{{asset($merchant->logo)}}"></td>

                                                    <td>{{ $merchant->user->mobile }}</td>
                                                    <td> {{$merchant->category->languages->first()->pivot->content ?? ""}}</td>

                                                    <td> {{$merchant->active}}</td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                            <a href="{{route('admin.merchant.edit',$merchant->id)}}"
                                                               class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                            <form
                                                                action="{{ route('admin.merchant.destroy',$merchant->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method("delete")
                                                                <button
                                                                    class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">
                                                                    حذف
                                                                </button>
                                                            </form>

                                                            <a href=""
                                                               class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">تفعيل</a>


                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">
                                            {!! $merchants->links() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection



