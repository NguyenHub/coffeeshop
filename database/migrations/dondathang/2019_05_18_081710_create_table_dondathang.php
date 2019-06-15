<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDondathang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_dat_hang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manhacungcap')->unsigned();
            $table->date('ngaydat');
            $table->string('ghichu',255)->nullable();
            $table->timestamps();
             $table->foreign('manhacungcap')->references('id')->on('nha_cung_cap')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('don_dat_hang');
    }
}
