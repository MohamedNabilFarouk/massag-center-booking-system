<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('mobile', 255)->nullable();
            $table->string('password', 60)->nullable();
            $table->string('token', 255)->nullable();
            $table->string('reset_token', 255)->nullable();
            $table->string('remember_token', 255)->nullable();
            $table->boolean('published')->default(false);
            $table->boolean('confirmed')->default(false);
            $table->string('confirm_code', 60)->nullable();
            $table->timestamp('confirm_expiration')->useCurrent();
            $table->string('profile_img', 250)->nullable();
            $table->string('social_id', 250)->nullable();
            $table->enum('social_type', ['facebook', 'google', 'twitter', 'apple'])->nullable();
            $table->timestamps();
            $table->double('wallet')->default(0);
            $table->string('country_iso', 20)->nullable();
            $table->string('country_code', 20)->nullable();
            $table->timestamp('reset_expiration')->nullable();
            $table->integer('reset_status')->default(0);
            $table->integer('country_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
