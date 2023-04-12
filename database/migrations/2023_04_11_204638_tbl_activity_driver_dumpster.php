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
            $table->foreignId('id_driver')->reference('id')->on('driver');
            $table->foreignId('id_call_demand')->reference('id')->on('call_demand');
            $table->integer('type_service')->comment('1 - COLOCACAO | 2 - TROCA | 3 - RETIRADA');
            $table->dateTime('datetime_start_demand')->nullable();
            $table->dateTime('datetime_finish_demand')->nullable();
            $table->json('dumpsters');
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
