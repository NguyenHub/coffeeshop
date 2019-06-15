<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChitietDonhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiet_donhang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('madonhang')->unsigned();
            $table->integer('mamon')->unsigned();
            $table->integer('soluong');
            $table->float('dongia',10,2);
            $table->string('ghichu',255)->nullable();
            $table->timestamps();
            $table->foreign('madonhang')->references('id')->on('don_hang')->onDelete('cascade');
            $table->foreign('mamon')->references('id')->on('mon')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitiet_donhang');
    }
}
