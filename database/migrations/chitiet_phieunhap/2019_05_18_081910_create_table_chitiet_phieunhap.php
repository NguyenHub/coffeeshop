<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChitietPhieunhap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiet_phieunhap', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('maphieunhap')->unsigned();
            $table->integer('manguyenlieu')->unsigned();
            $table->float('soluong',10,2);
            $table->float('dongia',10,2);
            $table->string('ghichu',255)->nullable();
            $table->timestamps();
            $table->foreign('maphieunhap')->references('id')->on('phieu_nhap')->onDelete('cascade');
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
        Schema::dropIfExists('chitiet_phieunhap');
    }
}
