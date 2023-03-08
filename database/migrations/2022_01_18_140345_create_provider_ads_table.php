<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_ads', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title', 255)->nullable();
            $table->string('title_ar', 255)->nullable();
            $table->text('description')->nullable();
            $table->text('description_ar')->nullable();
            $table->string('image', 255)->nullable();
            $table->integer('is_active')->nullable();
            $table->string('link', 255)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->integer('provider_id')->nullable();
            $table->timestamp('expiry_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provider_ads');
    }
}
