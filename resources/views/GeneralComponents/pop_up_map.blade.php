@component("GeneralComponents.bootstrap_modal")
    @slot('button_title',$button_title ?? '<i class="fas fa-map-marked"></i>')
    @slot('modal_title','Shop Location')
    @slot('button_class',$button_class ?? 'btn btn-xs btn-info')
    @slot('model_style')style='min-width: 100%;'@endslot
    @slot("body")
        <iframe
            src="https://maps.google.com/maps?q={{ $latitude }},{{ $longitude }}&z={{ $zoom ?? 7 }}&hl=es;z=14&amp;output=embed"
            width="1300" height="500">
        </iframe>
    @endslot
@endcomponent
