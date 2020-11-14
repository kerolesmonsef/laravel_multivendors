<?php
/** @var  string $fire_button_class */
/** @var  string $modal_class */
/** @var  string $crsf */
/** @var  string $method_in_form */

$form_ID = "Form_ID" . rand();
?>
<div class="modal fade {{ $modal_class }}" id="{{ "Modal_ID".rand() }}" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <p>{!!  $message ?? "Are You Sure ?"  !!}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="#" method="{{ $method ?? "POST" }}" id="{{$form_ID}}">
                    {{ $crsf ?? "" }}
                    {{ $method_in_form ?? "" }}
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            </div>
        </div>
    </div>
</div>


@push('scripts_stack')
    <script type="application/javascript">
        $(document).ready(function () {
            let form_ID = "#{{ $form_ID }}";

            $(document).on("click", ".{{ $fire_button_class }}", function () {
                let url_to_action = $(this).attr('data-delete-url');
                let form = $(form_ID);
                form.attr('action', url_to_action)
            });

        });

    </script>
@endpush
