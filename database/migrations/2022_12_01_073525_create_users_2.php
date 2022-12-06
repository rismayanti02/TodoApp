<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsers2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_2', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique;
            $table->string('remember_token');
            $table->string('email');
            $table->string('password');
            $table->string('name');
            $table->string('roles');
            $table->string('address');
            $table->string('phone');
            $table->string('avatar');
            $table->string('status', ['ACTIVE','INACTIVE']);
           
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_2');
    }
}
