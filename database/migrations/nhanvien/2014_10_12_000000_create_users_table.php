<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhan_vien', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tennhanvien');
            $table->date('ngaysinh');
            $table->boolean('gioitinh')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('sdt');
            $table->string('diachi',70);
            $table->boolean('trangthai');
            $table->integer('machucvu')->unsigned();
            $table->integer('maloai')->unsigned();
            $table->integer('maca')->unsigned();
            $table->foreign('machucvu')->references('id')->on('chuc_vu')->onDelete('cascade');
            $table->foreign('maca')->references('id')->on('ca_lam')->onDelete('cascade');
            $table->foreign('maloai')->references('id')->on('loai_nhan_vien')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhan_vien');
    }
}
