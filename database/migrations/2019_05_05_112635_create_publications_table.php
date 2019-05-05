<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationsTable extends Migration
{

    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('user_id')->unsigned();
                $table->string('title');
                $table->text('content');
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users');
            });
    }


    public function down()
    {
        Schema::dropIfExists('publications');
    }
}
