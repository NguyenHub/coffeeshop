<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChucVu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chuc_vu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenchucvu',20);
            $table->integer('maluong')->unsigned();
            $table->timestamps();
            $table->foreign('maluong')->references('id')->on('luong')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chuc_vu');
    }
}
