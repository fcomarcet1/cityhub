<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id');
            $table->string('phone_no');
            $table->string('pincode');
            $table->string('locality');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('landmark')->nullable();
            $table->string('alternate_no')->nullable();
            $table->string('pay_status')->nullable();
            $table->text('cart');
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
        Schema::dropIfExists('orders');
    }
}
