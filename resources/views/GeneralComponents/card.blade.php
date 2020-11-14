<div class="card">
    <div class="card-header" style="background-color: #dde1e6!important;">
        <h5 class="text-center text-primary" style="">
            <b>{!! $title ?? "Card Title" !!}</b>
        </h5>
    </div>
    <div class="card-body" style="border: 3px solid #dde1e6!important;border-top: 0 !important;overflow: hidden;">
        {{ $slot }}
    </div>
    @if(isset($footer))
        <div class="card-footer text-right">
            {{ $footer ?? "" }}
        </div>
    @endif
</div>
