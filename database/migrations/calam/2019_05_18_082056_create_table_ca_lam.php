<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCaLam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ca_lam', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenca',50)->unique();
            $table->time('giobatdau');
            $table->time('gioketthuc');
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
        Schema::dropIfExists('ca_lam');
    }
}
