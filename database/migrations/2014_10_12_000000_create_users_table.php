<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');     
            $table->date('ngaysinh');         
            $table->unsignedBigInteger('idphong');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('password2');
            $table->unsignedBigInteger('idcapbac');
            $table->boolean('trangthai');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('idcapbac')->references('idcapbac')->on('capbacs');
            $table->foreign('idphong')->references('idphong')->on('phongs');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
