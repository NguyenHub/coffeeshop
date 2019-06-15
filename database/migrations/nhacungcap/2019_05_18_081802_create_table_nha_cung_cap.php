<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNhaCungCap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nha_cung_cap', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tennhacungcap',50);
            $table->integer('sdt');
            $table->string('email')->unique()->nullable();
            $table->string('diachi',70);
            $table->string('ghichu',255);
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
        Schema::dropIfExists('nha_cung_cap');
    }
}
