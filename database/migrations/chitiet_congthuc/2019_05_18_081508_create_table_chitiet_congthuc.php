<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChitietCongthuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiet_congthuc', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mamon')->unsigned();
            $table->integer('manguyenlieu')->unsigned();
            $table->float('dinhluong',5,2);
            $table->string('donvitinh',10);
            $table->string('ghichu',255)->nullable();
            $table->timestamps();
            $table->foreign('mamon')->references('id')->on('mon')->onDelete('cascade');
            $table->foreign('manguyenlieu')->references('id')->on('nguyen_lieu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitiet_congthuc');
    }
}
