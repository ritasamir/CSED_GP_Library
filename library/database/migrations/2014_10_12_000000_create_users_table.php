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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('profile_img')->default("user.png");
            $table->string('department');
            $table->string('phone_number');
//            $table->string('national_id')->default(null);
            $table->string('graduation_year');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
<<<<<<< HEAD
            $table->string('national_id');
            $table->string('department');
            $table->string('avatar');
            $table->boolean('isTS'); 
            $table->boolean('verified'); 
=======
            $table->boolean('isTS')->default('1');
            $table->boolean('verified')->default('1');
            $table->rememberToken();
            $table->timestamps();
>>>>>>> f8ba84849c0e253cd4b7bf65a2a014cb513e913a
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
