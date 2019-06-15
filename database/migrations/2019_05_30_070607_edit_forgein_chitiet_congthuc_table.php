<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditForgeinChitietCongthucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chitiet_congthuc', function (Blueprint $table) {
            //$table->dropColumn('macongthuc');
            //$table->integer('macongthuc')->unsigned()->after('id');
            $table->foreign('macongthuc')->on('cong_thuc')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chitiet_congthuc', function (Blueprint $table) {
            //
        });
    }
}
