<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ban', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('makhuvuc')->unsigned();
            $table->integer('soban');
            $table->tinyInteger('trangthai');
            $table->timestamps();
            $table->foreign('makhuvuc')->references('id')->on('khu_vuc')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ban');
    }
}
