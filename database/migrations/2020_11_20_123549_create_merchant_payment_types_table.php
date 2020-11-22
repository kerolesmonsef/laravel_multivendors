<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantPaymentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_payment_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("merchant_id");
            $table->unsignedBigInteger('payment_type_id');
            $table->string("payment_email")->index("payment_email_index_in_payments_types");
            $table->string("payment_key")->nullable();
            $table->string("payment_secret")->nullable();
            $table->timestamps();

            $table->foreign("merchant_id")
                ->references("id")
                ->on("merchants")
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->foreign("payment_type_id")
                ->references("id")
                ->on("payment_types")
                ->onUpdate("cascade");

            $table->unique(['merchant_id', 'payment_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchant_payment_types');
    }
}
