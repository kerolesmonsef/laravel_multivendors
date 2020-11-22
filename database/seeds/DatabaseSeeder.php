<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LanguageSeeder::class,
            MainCategorySeeder::class,
            PaymentTypeSeeder::class,
            MerchantTableSeeder::class,
            ProductSeeder::class,
            AdminSeeder::class,
            LanguageableSeeder::class,
            MerchantPaymentTypeSeeder::class,
        ]);
    }
}
