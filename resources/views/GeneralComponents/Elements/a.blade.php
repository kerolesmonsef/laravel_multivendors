<a style="{{ $style ?? "padding:2px" }}" href="{{ $link ?? "#" }}" class=" {{ $class ?? "btn btn-info" }}"
   data-toggle="tooltip" data-placement="top" title="{{ $hover ?? "" }}">

    @if(isset($i))
        <i class="{{ $i }}"></i>
    @endif
    {{ $content ?? "Content" }}
</a>
