<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citations', function (Blueprint $table) {
            $table->integer('post_id')->unsigned();
            $table->integer('user_id')->unsigned();
        });
        Schema::table('citations', function(Blueprint $table){
            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('user_id')->references('id')->on('users');
            $table->primary(array('post_id', 'user_id'));

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citations');
    }
}
