<?php
/**
 * @var $name string
 * @var $type string
 * @var $value string
 * @var $icon string
 * @var $icon2 string
 * @var select string select box
 * @var $border_class string
 * @var $label_color_class string
 *
 *
 *
 * @var $errors string
 */

$border_class = $border_class ?? "border-dark-blue";
$redirect_error = $errors->first($name ?? "");

?>

<div
    @if(isset($hover_pop_up))
    data-toggle="popover" data-trigger="hover" data-content="{{ $hover_pop_up }}" data-placement="top" title="Note"
    @endif
    class="form-group form-group-input-border border {{ $errors->first($name ?? "") ? 'border-danger' : $border_class }}">
    <label style="{{ isset($label_z_index) ? "z-index:$label_z_index" : '' }}">
        {{ $l_name ?? "Label Name" }}
        @include('GeneralComponents.icon')
    </label>
    <label style="{{ isset($label_z_index) ? "z-index:$label_z_index" : '' }}"
           class="text-danger text-sm mb-1">
        {{  $redirect_error }}
        @if($redirect_error)
            @include('GeneralComponents.icon')
        @endif
    </label>
    @if(isset($other))
        {{ $other }}
    @else
        <input
            type="{{ $type ?? "text" }}"
            name="{{ $name ?? "" }}"
            class="form-control border-0 {{ $input_class ?? '' }}"
            {{ $required ?? "" }}
            value="{{ $value ?? "" }}"
            style="{{ $input_style ?? '' }} ; {{ isset($readonly) ? 'background-color :#FFF' : '' }}"
            @if(isset($readonly))
            readonly
            @endif
        />
    @endif
</div>
