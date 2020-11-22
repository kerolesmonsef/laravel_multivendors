<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `main_categories` (`id`, `slug`, `photo`, `active`, `created_at`, `updated_at`) VALUES
(1, 'moto', 'https://picsum.photos/200/200?random=1', 'yes', '2020-11-13 08:03:48', '2020-11-13 09:00:49'),
(2, 'cars', 'https://picsum.photos/200/200?random=1', 'yes', '2020-11-13 08:08:42', '2020-11-13 08:08:42'),
(3, 'comp', 'https://picsum.photos/200/200?random=1', 'yes', '2020-11-13 08:09:40', '2020-11-13 08:09:40'),
(4, 'shops', 'https://picsum.photos/200/200?random=1', 'yes', '2020-11-13 08:11:37', '2020-11-13 08:11:37');
");
    }
}
