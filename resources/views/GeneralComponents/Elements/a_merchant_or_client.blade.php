@if($membertype_id == 1)
    <a href="{{ $merchant_link ?? "#" }}"
       data-toggle="tooltip"
       data-placement="top" title="Merchant">
         {{ $name ?? "Name" }}
    </a>
@else
    <a href="{{ $client_link ?? "#" }}" data-toggle="tooltip" data-placement="top" title="Client">
        {{ $name ?? "Name" }}
    </a>
@endif
