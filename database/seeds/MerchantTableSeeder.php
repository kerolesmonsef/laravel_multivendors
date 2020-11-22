<?php

use App\Models\MainCategory;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Modules\Merchant\Entities\Merchant;

class MerchantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ar_JO');
        $MainCategory = MainCategory::all();
        for ($i = 0; $i < 10; $i++) {
            $save = [
                'address' => $faker->address,
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude,
                'category_id' => $MainCategory->random()->id,
                'logo' => random_image_url(),
            ];
           $merchant =  Merchant::create($save);

            $user = User::create([
                'profile_type' => Merchant::class,
                'profile_id' => $merchant->id,
                'active' => 'yes',
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'mobile' => $faker->unique()->phoneNumber,
                'password' => bcrypt("password"),
                'photo' => random_image_url(),
            ]);

        }
    }
}
