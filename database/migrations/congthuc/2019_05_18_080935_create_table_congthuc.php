<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCongthuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cong_thuc', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mamon')->unsigned();
            $table->string('tencongthuc',50);
            $table->string('ghichu',255)->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('cong_thuc');
    }
}
