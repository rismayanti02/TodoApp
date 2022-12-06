<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders__', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id');
            $table->float('total_price');
            $table->string('invoice_number');
            $table->enum('status', ['submit', 'process','finish','cancel']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders__');
    }
}
