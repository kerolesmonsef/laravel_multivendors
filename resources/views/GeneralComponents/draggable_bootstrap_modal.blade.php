<?php
$ModelID = "KJI" . rand(4, 5465465665);
?>

<button href="#{{ $ModelID }}" type="button" class="{{ $button_class ?? "btn btn-sm btn-info" }}" data-backdrop="false"
        data-toggle="modal" style="{{ $button_style ?? "" }}">
    {!!  $button_title ?? "button Title" !!}
</button>

<div id="{{ $ModelID }}" class="modal fade draggable_bootstrab_model_class_unique" style="overflow: hidden">
    <div class="modal-dialog modal-dialog-centered {{ $model_size ?? "modal-lg" }}"
         style=" margin-right: 0;margin-left: 0;">
        <div class="modal-content">
            <div class="modal-header text-left"
                 style="height: 30px;padding: 20px;background-color: #18456b;color: white; cursor: cell;">
                <h5 class="modal-title"
                    style=" margin-top:-10px;font-size:16px;">{{ $modal_title ?? "Modal Title" }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style=" margin-top: -30px; color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 5px 35px 20px;">
                {!!  $body ?? ""  !!}
            </div>
            @if(isset($footer))
                <div class="modal-footer">
                    {!! $footer !!}
                </div>
            @else
                <div class="modal-footer" style="cursor: cell">
                    <button type="button" data-dismiss="modal" class="btn btn-danger">
                        Close
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>
