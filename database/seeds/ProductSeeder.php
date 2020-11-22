<?php

use App\MYMODEL\Helpers\SeedBigData;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Modules\Merchant\Entities\Merchant;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $save = [];
        $merchants = Merchant::all();
        $faker = Factory::create('ar_JO');
        for ($i = 0; $i < 1000; $i++) {
            $save[] = [
                'merchant_id' => $merchants->random()->id,
                'name' => $faker->unique()->name,
                'slug' => $faker->unique()->slug,
                'details' => $faker->sentence(rand(6, 10)),
                'description' => $faker->sentence(rand(6, 10)),
                'image' => random_image_url(),
                'price' => rand(1,40),
                'quantity' => rand(10,15),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        $big = new SeedBigData($save,200,"products");
        $big->run();
    }
}
