<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('building_number', 255)->nullable();
            $table->string('floor_number', 255)->nullable();
            $table->string('flat_number', 255)->nullable();
            $table->string('area', 255)->nullable();
            $table->string('street', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('building_type', 255)->nullable();
            $table->integer('client_id')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
            $table->string('lat', 255)->nullable();
            $table->string('lng', 255)->nullable();
            $table->integer('is_active')->nullable()->default(1);
            $table->string('city', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
