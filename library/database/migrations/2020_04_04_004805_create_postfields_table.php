<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostfieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postfields', function (Blueprint $table) {
            $table->integer('post_id')->unsigned();
            $table->string('fname');
        });
        Schema::table('postfields', function(Blueprint $table) {
            $table->foreign('post_id')->references('id')->on('posts');
            $table->primary(array('fname', 'post_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postfields');
    }
}
