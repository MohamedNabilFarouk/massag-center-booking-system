<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersAdminsChatMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers_admins_chat_messages', function (Blueprint $table) {
            $table->integer('id', true);
            $table->enum('sent_by', ['customer', 'admin']);
            $table->integer('sender_id');
            $table->text('message')->nullable();
            $table->string('image', 255)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->integer('chat_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers_admins_chat_messages');
    }
}
