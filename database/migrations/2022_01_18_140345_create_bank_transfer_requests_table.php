<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankTransferRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_transfer_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('amount');
            $table->text('receipt_pic');
            $table->integer('order_id');
            $table->boolean('approved_by_admin')->default(false);
            $table->timestamps();
            $table->string('notes', 255)->nullable();
            $table->integer('bank_account')->nullable();
            $table->string('transfer_number', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_transfer_requests');
    }
}
