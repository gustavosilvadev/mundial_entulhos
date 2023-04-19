<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblActivityDriverDumpster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_driver_demand_dumpster', function (Blueprint $table) {

            $table->id();
            $table->foreignId('id_call_demand_sequence')->references('id')->on('call_demand');
            $table->integer('id_call_demand')->references('id_demand')->on('call_demand');
            $table->foreignId('id_driver')->references('id')->on('driver');
            $table->string('type_service')->comment('COLOCACAO|TROCA|RETIRADA');
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
        Schema::dropIfExists('activity_driver_demand_dumpster');
    }
}
