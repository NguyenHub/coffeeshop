<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttributeTableNhanvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nhan_vien', function (Blueprint $table) {
            $table->date('ngayvaolam');
            $table->string('ghichu',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nhan_vien', function (Blueprint $table) {
            $table->dropColumn('ngayvaolam');
            $table->dropColumn('ghichu');
        });
    }
}
