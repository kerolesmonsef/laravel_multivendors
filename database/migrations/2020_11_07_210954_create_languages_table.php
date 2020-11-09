<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string("short_cut")->nullable()->default(null);
            $table->string("local")->nullable()->default(null);
            $table->string("name")->nullable()->default(null);
            $table->string("native")->nullable()->default(null);
            $table->string("app_name")->nullable()->default(null);
            $table->string("script")->nullable()->default(null);
            $table->enum("direction", ['rtl', "ltr"])->nullable()->default('ltr');
            $table->enum("active", ["yes", "no"])->default('yes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
