<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Product;
use Modules\Merchant\Entities\Merchant;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->slug,
        'details' => $faker->sentence(rand(6, 10)),
        'image' => random_image_url(),
        'merchant_id' => Merchant::query()->inRandomOrder()->first()->id,
    ];
});
