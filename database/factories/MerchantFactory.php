<?php

/** @var Factory $factory */

use App\Models\MainCategory;
use Illuminate\Database\Eloquent\Factory;
use Modules\Merchant\Entities\Merchant;

$factory->define(Merchant::class, function () {
    $faker = Faker\Factory::create('ar_JO');
    return [
        'address' => $faker->address,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'category_id' => MainCategory::query()->inRandomOrder()->first()->id,
        'active' => rand() % 4 == 0 ? 'yes' : 'no',
    ];
});
