<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKhachhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khach_hang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenkhachhang',50);
            $table->integer('sdt');
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->boolean('gioitinh')->nullable();
            $table->date('ngaysinh')->nullable();
            $table->string('diachi',70);
            $table->integer('diemtichluy')->nullable();
            $table->boolean('loaikhachhang');
            $table->boolean('trangthai');
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('khach_hang');
    }
}
