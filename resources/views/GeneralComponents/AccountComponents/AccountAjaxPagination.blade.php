{{--@extends('layouts.master')--}}

{{--@section('content')--}}
<div class="row">
    <div class="col-sm-5">
        <input type="hidden" class="the_hidden_account_id" value="{{ old("account_id") }}" name="account_id">
        @component('GeneralComponents.draggable_bootstrap_modal')
            @slot('body')
                <div class="search mt-2 mb-2">
                    <div class="row">
                        <div class="col-3">
                            <div class="input-group">
                                <input type="search"
                                       placeholder="Search..." class="form-control the_search_for_accounts_input_text">
                            </div>
                        </div>
                        <div class="col-1" style="float: right;">
                            <button class="btn btn-info the_search_for_users_button_class" type="button">
                                <i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <div id="table_data_accounts">

                </div>
            @endslot
            @slot("button_title",$button_title ?? "button_title")
            @slot("button_style",($button_style ?? ""))
        @endcomponent
    </div>
    <div class="col-sm-7">
        <input type="text" value="{{ old('user_name_readonly_class_input') }}"
               style="{{ $input_style ?? '' }}"
               name="user_name_readonly_class_input"
               class="form-control user_name_readonly_class_input" readonly>
    </div>
</div>
{{--@endsection--}}
@push('scripts_stack')
    <script>

        $(document).on('click', '.pagination a', function (event) {
            event.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            select_account_data_and_feach(page);
        });

        var select_account_data_and_feach = (page, search = "", account_type = "merchant") => {
            $.ajax({
                url: "{{ route('account.filter') }}?page=" + page + "&search=" + search + "&account_type=" + account_type,
                success: (data) => {
                    $('#table_data_accounts').html(data);
                },
                error: () => {
                    // alert("error occur");
                }
            });
        }

        $(document).on('click', '.featch_user_table_row', function (event) {
            let account_id = $(this).attr('data-user-id');
            let user_name = $(this).attr('data-name');
            $('.the_hidden_account_id').val(account_id).trigger('change');
            $('.user_name_readonly_class_input').val(user_name);
        });

        $(".users_type").change(function () {
            begine_search();
        });

        $(".the_search_for_accounts_input_text").keyup(function () {
            begine_search();
        });

        $(".the_search_for_users_button_class").click(function () {
            begine_search();
        });

        var begine_search = () => {
            select_account_data_and_feach(1, $('.the_search_for_accounts_input_text').val(), $('.users_type').val())
        }

        begine_search();
    </script>
@endpush
