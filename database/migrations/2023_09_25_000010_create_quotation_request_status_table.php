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
        Schema::create('quotation_request_status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('request_id')->index();
            $table->enum('status', ['Draft', 'Submitted', 'Approved 1', 'Approved 2', 'Approved 3', 'Revised', 'Rejected', 'Canceled']);
            $table->dateTime('at');
            $table->unsignedBigInteger('by');
            $table->string('note')->nullable();

            $table->foreign('request_id')->references('request_id')->on('quotation_request');
            $table->foreign('by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotation_request_status');
    }
};
