<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `languageables` (`id`, `languageable_type`, `languageable_id`, `content`, `language_id`, `created_at`, `updated_at`) VALUES
    (1, 'App\\\\Models\\\\MainCategory', 1, 'motorcycle', 1, NULL, NULL),
    (2, 'App\\\\Models\\\\MainCategory', 1, 'الموتوسكلات ', 2, NULL, NULL),
    (3, 'App\\\\Models\\\\MainCategory', 1, 'motorcycle  french', 3, NULL, NULL),
    (4, 'App\\\\Models\\\\MainCategory', 2, 'cars', 1, NULL, NULL),
    (5, 'App\\\\Models\\\\MainCategory', 2, 'سيارات', 2, NULL, NULL),
    (6, 'App\\\\Models\\\\MainCategory', 2, 'cariano', 3, NULL, NULL),
    (7, 'App\\\\Models\\\\MainCategory', 3, 'computer', 1, NULL, NULL),
    (8, 'App\\\\Models\\\\MainCategory', 3, 'كومبيوتر', 2, NULL, NULL),
    (9, 'App\\\\Models\\\\MainCategory', 3, 'commuter french', 3, NULL, NULL),
    (10, 'App\\\\Models\\\\MainCategory', 4, 'shop', 1, NULL, NULL),
    (11, 'App\\\\Models\\\\MainCategory', 4, 'محل', 2, NULL, NULL),
    (12, 'App\\\\Models\\\\MainCategory', 4, 'shop French', 3, NULL, NULL),
    (13, 'App\\\\Models\\\\MainCategory', 3, 'Spanish computer', 4, NULL, NULL),
    (14, 'App\\\\Models\\\\MainCategory', 2, 'Spanish Cars', 4, NULL, NULL);");
    }
}
