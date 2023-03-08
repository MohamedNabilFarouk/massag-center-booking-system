<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->char('iso', 2);
            $table->string('name', 80)->nullable();
            $table->string('nicename', 80);
            $table->char('iso3', 3)->nullable();
            $table->smallInteger('numcode')->nullable();
            $table->string('phonecode', 111);
            $table->string('offset', 255)->nullable();
            $table->string('bank_account', 255)->nullable();
            $table->double('fees_percentage')->nullable();
            $table->double('lowest_value')->nullable();
            $table->integer('wallet_limit')->nullable();
            $table->string('iban', 255)->nullable();
            $table->string('bank_name', 255)->nullable();
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
            $table->integer('is_active')->default(0);
            $table->integer('nearest_zones')->default(0);
            $table->string('name_ar', 80)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
