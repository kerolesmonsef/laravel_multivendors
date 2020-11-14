<?php

/** @var int $type */

$boarder = "none";
if ($type == 'pre_paid') {
    $name = 'Prepaid';
    $bg_color = "#FFF";
    $font_color = "#000";
    $boarder = "1px solid #d0d0d0";
} else {
    $name = 'Postpaid';
    $bg_color = "#580810";
    $font_color = "#FFF";
}

?>

<span class="badge" style="background-color: {{ $bg_color }}; color: {{ $font_color }} ; border: {{ $boarder }}">{{ $name }}</span>
