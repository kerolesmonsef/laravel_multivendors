<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_categories', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger("translation_id")->unsigned();
            $table->unsignedTinyInteger("translation_of");
            $table->string("name")->nullable()->default(null);
            $table->string("slug")->nullable()->default(null);
            $table->string("photo")->nullable()->default(null);
            $table->enum("active", ["yes", "no"])->default('yes');
            $table->timestamps();

            $table->foreign("translation_id")->references("id")->on("languages")
                ->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_categories');
    }
}
