<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service');
            $table->string('name');
            $table->integer('user_id');
            $table->string('status')->nullable();
            $table->string('phone_no');
            $table->string('pincode');
            $table->string('locality');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('landmark')->nullable();
            $table->string('alternate_no')->nullable();
            $table->string('pay_status')->nullable();
            $table->text('answers');
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
        Schema::dropIfExists('services_requests');
    }
}
