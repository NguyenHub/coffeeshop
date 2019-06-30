<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDonhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_hang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manv')->nullable()->unsigned();
            $table->integer('makhachhang')->nullable()->unsigned();
            $table->integer('maban')->nullable()->unsigned();
            $table->dateTime('ngaydat');
            $table->float('thanhtien',10);
            $table->string('makhuyenmai')->nullable()->unsigned();
            $table->string('sdt');
            $table->string('diachi',50);
            $table->string('ghichu',255)->nullable();
            $table->tinyInteger('trangthai');
            $table->timestamps();
            $table->foreign('manv')->references('id')->on('nhan_vien')->onDelete('cascade');
            $table->foreign('makhachhang')->references('id')->on('khach_hang')->onDelete('cascade');
            $table->foreign('maban')->references('id')->on('ban')->onDelete('cascade');
            $table->foreign('makhuyenmai')->references('code_km')->on('khuyen_mai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('don_hang');
    }
}
