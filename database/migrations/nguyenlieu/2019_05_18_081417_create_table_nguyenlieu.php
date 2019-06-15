<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNguyenlieu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguyen_lieu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tennguyenlieu',50);
            $table->float('soluong',5,2);
            $table->string('donvitinh',10)->nullable();
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
        Schema::dropIfExists('nguyen_lieu');
    }
}
