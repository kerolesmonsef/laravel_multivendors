<?php

namespace App\MYMODEL\Helpers;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SeedBigData extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $data_array;
    private $chunks_NUM;
    private $table;

    public function __construct($data, $chunks_NUM, $table)
    {
        $this->data_array = $data;
        $this->chunks_NUM = $chunks_NUM;
        $this->table = $table;
    }

    public static function Email($faker, int $extraStr = 20)
    {
        return $faker->unique()->email . Str::random($extraStr);
    }

    public static function Mobile($faker)
    {
        return $faker->unique()->e164PhoneNumber . rand();
    }

    public function run()
    {
        $collection = collect($this->data_array);
        $chunks = $collection->chunk($this->chunks_NUM);
        $chunks->toArray();
        foreach ($chunks as $chunk) {
            DB::table($this->table)->insert($chunk->toArray());
            // echo "*";
        }
    }

}
