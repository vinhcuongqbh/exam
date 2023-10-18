<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCauhoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cauhois', function (Blueprint $table) {
            $table->bigIncrements('idcauhoi');
            $table->boolean('linhvuc');
            $table->boolean('trangthai');
            $table->longtext('cauhoi');
            $table->longtext('dapan1');
            $table->longtext('dapan2');
            $table->longtext('dapan3');
            $table->longtext('dapan4');
            $table->tinyInteger('dapandung');
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
        Schema::dropIfExists('cauhois');
    }
}
