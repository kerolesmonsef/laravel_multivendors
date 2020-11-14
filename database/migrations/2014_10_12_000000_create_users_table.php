<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum("active", ['yes', 'no'])->default("yes");

            $table->string("profile_type")->nullable()->default(null);
            $table->unsignedBigInteger("profile_id")->nullable()->default(null);


            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable()->default(null);
            $table->rememberToken();
            $table->timestamps();

            $table->index(["profile_type", "profile_id"], 'users_profile_type_profile_id_index');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
