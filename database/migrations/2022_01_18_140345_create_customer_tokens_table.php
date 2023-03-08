<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id')->nullable();
            $table->string('device_id', 255)->nullable();
            $table->string('mobile_id', 255)->nullable();
            $table->string('token', 255)->nullable();
            $table->timestamps();
            $table->string('device_type', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_tokens');
    }
}
