<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title', 225);
            $table->string('title_ar', 250)->nullable();
            $table->text('description')->nullable();
            $table->string('main_image', 250)->nullable();
            $table->timestamps();
            $table->boolean('approved_by_admin')->default(false);
            $table->integer('is_active')->default(0);
            $table->text('description_ar')->nullable();
            $table->integer('provider_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->double('prepare_time')->nullable();
            $table->integer('avg_rate')->nullable();
            $table->integer('quantity')->default(0);
            $table->double('price')->nullable();
            $table->double('offer_price')->nullable();
            $table->double('offer_end_date')->nullable();
            $table->integer('offer_is_active')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
