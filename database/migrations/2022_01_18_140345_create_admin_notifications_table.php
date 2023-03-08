<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_notifications', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('admin_id');
            $table->string('message', 255)->nullable();
            $table->timestamp('created_at')->useCurrentOnUpdate()->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('readed')->default(0);
            $table->integer('relation_id')->nullable();
            $table->string('relation_object', 255)->nullable();
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
        Schema::dropIfExists('admin_notifications');
    }
}
