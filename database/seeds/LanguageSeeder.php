<?php

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'name' => 'english',
            'direction' => 'rtl',
            'active' => 'yes',
            'short_cut'=>'en'
        ]);

        Language::create([
            'name' => 'العربية',
            'direction' => 'rtl',
            'active' => 'yes',
            'short_cut'=>'ar'
        ]);

        Language::create([
            'name' => 'French',
            'direction' => 'rtl',
            'active' => 'yes',
            'short_cut'=>'fr'
        ]);

        Language::create([
            'name' => 'Spanish',
            'direction' => 'rtl',
            'active' => 'yes',
            'short_cut'=>'sp'
        ]);


    }
}
