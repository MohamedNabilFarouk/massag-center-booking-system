<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 20);
            $table->string('name', 255);
            $table->text('description');
            $table->timestamps();
            $table->integer('status')->default(1);
            $table->integer('is_deleted')->default(0);
            $table->integer('is_original')->default(1);
            $table->integer('country_id')->default(63);
            $table->integer('gov_id');
            $table->integer('zone_group')->default(1);
            $table->string('name_ar', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zones');
    }
}
