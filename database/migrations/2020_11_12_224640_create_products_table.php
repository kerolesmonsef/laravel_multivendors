<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('merchant_id');
            $table->string('name');
            $table->string('slug');
            $table->string('details','500')->nullable();
            $table->string('image','255')->nullable();
            $table->integer('price')->default(0);
            $table->text('description');
            $table->unsignedInteger('quantity')->default(0);
            $table->timestamps();

            $table
                ->foreign("merchant_id")
                ->on("merchants")
                ->references("id")
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
