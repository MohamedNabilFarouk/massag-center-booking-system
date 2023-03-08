<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('country_code', 50)->nullable();
            $table->string('mobile', 255)->nullable();
            $table->string('password', 60)->nullable();
            $table->string('token', 255)->nullable();
            $table->boolean('published')->default(true);
            $table->integer('status')->nullable();
            $table->string('profile_img', 255)->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->timestamps();
            $table->decimal('wallet', 10, 0)->nullable()->default(0);
            $table->string('email', 255)->nullable();
            $table->string('slogan', 255)->nullable();
            $table->double('highKMPrice')->nullable();
            $table->double('lowKMPrice')->nullable();
            $table->integer('confirmed')->default(0);
            $table->string('reset_token', 255)->nullable();
            $table->string('remember_token', 255)->nullable();
            $table->string('confirm_code', 255)->nullable();
            $table->timestamp('confirm_expiration')->nullable();
            $table->timestamp('reset_expiration')->nullable();
            $table->integer('reset_status')->default(0);
            $table->string('merchant_mail', 255)->nullable();
            $table->string('secret_key', 255)->nullable();
            $table->string('bank_name', 255)->nullable();
            $table->string('iban', 255)->nullable();
            $table->string('account_number', 255)->nullable();
            $table->string('zone', 255)->nullable();
            $table->string('gov', 255);
            $table->string('country', 255);
            $table->double('fees_percentage')->nullable();
            $table->double('lowest_value')->nullable();
            $table->integer('deposits_count')->default(3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers');
    }
}
