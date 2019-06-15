<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChitietDondathang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiet_dondathang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('madonhang')->unsigned();
            $table->integer('manguyenlieu')->unsigned();
            $table->float('soluong',10,2);
            $table->string('ghichu',255)->nullable();
            $table->timestamps();
            $table->foreign('madonhang')->references('id')->on('don_dat_hang')->onDelete('cascade');
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
        Schema::dropIfExists('chitiet_dondathang');
    }
}
