<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaithisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baithis', function (Blueprint $table) {
            $table->unsignedBigInteger('idbaithi')->unique();
            $table->unsignedBigInteger('idthisinh');
            $table->unsignedBigInteger('idkythi');
            $table->tinyInteger('diemtonghop')->nullable();    
            $table->tinyInteger('phamquy')->nullable();
            $table->boolean('trangthai');
            $table->timestamps();

            $table->foreign('idthisinh')->references('id')->on('users');
            $table->foreign('idkythi')->references('idkythi')->on('kythis');                    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baithis');
    }
}
