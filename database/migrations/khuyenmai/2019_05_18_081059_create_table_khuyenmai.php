<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKhuyenmai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('khuyen_mai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenkhuyenmai',50);
            $table->tinyInteger('loaikhuyenmai');
            $table->integer('soluong');
            $table->float('giatri',5,2);
            $table->string('codekm',10);
            $table->dateTime('ngaybatdau');
            $table->dateTime('ngayketthuc');
            $table->string('ghichu',255)->nullable();
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
        //Schema::dropIfExists('khuyen_mai');
    }
}
