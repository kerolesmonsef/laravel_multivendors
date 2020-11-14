<?php
use Illuminate\Support\Str;
$row_class = "o-bg-success";
/** @var string $status */
if ($status == 'fail') {
    $row_class = 'o-bg-danger';
} elseif ($status == 'waiting_payment') {
    $row_class = 'o-bg-warning';
}
?>

<span class="badge {{ $row_class }}">{{ str_replace('_', ' ', $status) }}</span>
