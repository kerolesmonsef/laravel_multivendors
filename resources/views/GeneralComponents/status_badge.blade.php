<?php

/**
 * @var int $id
 * @var array $change_names # [1 => "new Merchant"]
 */

use App\Logging\Status;
use Illuminate\Support\Facades\Config;

if (!Config::has('database_statuses')) {
    $database_statuses = Status::all();
    Config::set("database_statuses", $database_statuses);
} else {
    $database_statuses = Config::get('database_statuses');
}

$statuses = [
    'Pending' => [
        'name' => 'Pending',
        'color' => "#fffa59",
        "font_color" => "#1f2d3d",
    ],
    'Waiting' => [
        'name' => 'Waiting For Review',
        'color' => "#ffc107",
        "font_color" => "#1f2d3d",
    ],
    'In Review' => [
        'name' => 'In Review',
        'color' => "#72ce87",
        "font_color" => "#1f2d3d",
    ],
    'Active' => [
        'name' => 'Active',
        'color' => "#28a745",
        "font_color" => "#FFF",
    ],
    'Disabled' => [
        'name' => 'Disabled',
        'color' => "#dc3545",
        "font_color" => "#FFF",
    ],
    'Banned' => [
        'name' => 'Banned',
        'color' => "#343a40",
        "font_color" => "#FFF",
    ],
    'Closed' => [
        'name' => 'Closed',
        'color' => "#a72e00",
        "font_color" => "#FFF",
    ],
    'Rejected' => [
        'name' => 'Rejected',
        'color' => "#580810",
        "font_color" => "#FFF",
    ],
    'OTP' => [
        'name' => 'OTP',
        'color' => "#007bff",
        "font_color" => "#FFF",
    ],
    'New' => [
        'name' => 'New',
        'color' => "#dc3545",
        "font_color" => "#FFF",
    ],
    'Waiting_customer_replay' => [
        'name' => 'Waiting Customer Replay',
        'color' => "#007bff",
        "font_color" => "#FFF",
    ],
    'Waiting_for_reviewing_info' => [
        'name' => 'Waiting For Review',
        'color' => "#ffc107",
        "font_color" => "#1f2d3d",
    ],
];

try {
    $name = $database_statuses[$id - 1]->name;
    $color = $statuses[array_keys($statuses)[$id - 1]]['color'];
    $font_color = $statuses[array_keys($statuses)[$id - 1]]['font_color'];
    if (isset($change_names)) {
        if (array_key_exists($id, $change_names)) {
            $name = $change_names[$id];
        }
    }
} catch (\Exception $e) {
    $name = 'Not Found Status';
    $color = '#fffa59';
    $font_color = '#1f2d3d';
}
?>

<span class="badge" style="background-color: {{ $color }}; color: {{ $font_color }} ">{{ $name }}</span>
