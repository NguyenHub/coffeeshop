<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mon', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('maloai')->unsigned();
            $table->string('tenmon',50);
            $table->float('dongia',10,2);
            $table->string('ghichu',255)->nullable();
            $table->tinyInteger('trangthai');
            $table->timestamps();
            $table->foreign('maloai')->references('id')->on('loai_mon')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mon');
    }
}
