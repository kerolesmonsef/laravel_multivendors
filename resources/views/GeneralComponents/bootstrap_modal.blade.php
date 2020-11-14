<!-- Button trigger modal -->
<?php
$modal_id = $modal_id ?? ("ID" . rand(455666, 56446664));
?>

<button type="button" class="{{ $button_class ?? "btn btn-sm btn-info" }}" data-toggle="modal"
        data-target="#{{ $modal_id }}">
    {!!  $button_title ?? "button Title" !!}
</button>

<!-- Modal -->
<div class="modal fade" id="{{$modal_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered {{ $model_size ?? "modal-lg" }}"
         role="document" {{ $model_style ?? "" }}>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{!!  $modal_title ?? "modal_title"  !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!!  $body ?? ""  !!}
            </div>
            @if(isset($footer))
                <div class="modal-footer">
                    {!! $footer !!}
                </div>
            @endif
        </div>
    </div>
</div>
