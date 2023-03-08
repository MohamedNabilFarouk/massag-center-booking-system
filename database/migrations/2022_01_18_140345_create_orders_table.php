<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('provider_id');
            $table->integer('client_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('order_time')->nullable();
            $table->integer('payment_method');
            $table->integer('address_id');
            $table->double('total_amount')->nullable();
            $table->string('promo_code', 10)->nullable();
            $table->double('delivery_fees');
            $table->integer('status_id');
            $table->integer('driver_id')->nullable();
            $table->string('tracking_number', 20)->nullable();
            $table->double('discount_amount')->nullable();
            $table->string('order_num', 255)->nullable();
            $table->integer('order_type_id')->nullable()->default(1);
            $table->double('delivery_distance_meters')->nullable();
            $table->double('delivery_distance_time')->nullable();
            $table->timestamp('delivery_start_time')->nullable();
            $table->timestamp('preparing_start_time')->nullable();
            $table->double('client_paid_amount')->nullable();
            $table->float('company_fees', 10, 0)->nullable();
            $table->float('provider_wallet_value', 10, 0)->nullable();
            $table->float('provider_fees', 10, 0);
            $table->integer('is_wallet_satisfied')->default(0);
            $table->float('wallet_amount', 10, 0)->nullable()->default(0);
            $table->timestamp('pickup_time')->nullable();
            $table->timestamp('delivery_time')->nullable();
            $table->integer('bank_requrest_id')->nullable();
            $table->integer('driver_status_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
