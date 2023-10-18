<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoidungbaithisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noidungbaithis', function (Blueprint $table) {
            $table->unsignedBigInteger('idbaithi');
            $table->unsignedBigInteger('idcauhoi');
            $table->tinyInteger('dapandung');
            $table->tinyInteger('dapanthisinh')->nullable();
            $table->boolean('diem')->nullable();
            $table->timestamps();

            $table->foreign('idbaithi')->references('idbaithi')->on('baithis');
            $table->foreign('idcauhoi')->references('idcauhoi')->on('cauhois');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noidungbaithis');
    }
}
