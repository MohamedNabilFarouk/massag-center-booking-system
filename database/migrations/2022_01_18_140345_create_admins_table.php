<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('super_admin')->default(0);
            $table->string('name', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('password', 60)->nullable();
            $table->boolean('published')->default(true);
            $table->string('address', 255)->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->unsignedInteger('admin_id')->default('0');
            $table->timestamps();
            $table->string('mobile', 255)->nullable();
            $table->string('profile_img', 255)->nullable();
            $table->integer('role_id')->nullable();
            $table->integer('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
