<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DumpsterServiceDemand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dumpster_service_demand', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_call_demand')->references('id')->on('call_demand');
            $table->foreignId('id_driver')->references('id')->on('driver');
            $table->dateTime('start_service_date');
            $table->dateTime('dumpster_allocate_date')->nullable();
            $table->dateTime('dumpster_collected_date')->nullable();
            $table->dateTime('end_service_date')->nullable();
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dumpster_service_demand');
    }
}
