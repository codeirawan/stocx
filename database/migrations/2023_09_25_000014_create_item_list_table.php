<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('material_request_id');
            $table->unsignedBigInteger('purchase_request_id');
            $table->integer('quantity');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('item_id')->references('id')->on('master_items');
            $table->foreign('material_request_id')->references('id')->on('material_request');
            $table->foreign('purchase_request_id')->references('id')->on('purchase_request');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_request');
    }
};
