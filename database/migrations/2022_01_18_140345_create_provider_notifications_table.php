<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_notifications', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('provider_id');
            $table->string('message', 255)->nullable();
            $table->timestamps();
            $table->integer('readed')->default(0);
            $table->integer('relation_id')->nullable();
            $table->string('relation_object', 25)->nullable();
            $table->string('message_ar', 255)->nullable();
            $table->string('link', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provider_notifications');
    }
}
