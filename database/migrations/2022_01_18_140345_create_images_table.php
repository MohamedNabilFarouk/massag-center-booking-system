<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255)->nullable();
            $table->string('image_name', 255)->nullable()->index('image_name');
            $table->unsignedBigInteger('imageable_id')->nullable()->index('imageable_id');
            $table->string('imageable_type', 255)->nullable()->index('imageable_type');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->unsignedBigInteger('admin_id')->nullable()->default('0')->index('admin_id');

            $table->index(['imageable_id', 'imageable_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
