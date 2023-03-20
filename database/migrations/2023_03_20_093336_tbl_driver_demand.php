<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblDriverDemand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_demand', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_call_demand')->references('id')->on('call_demand');
            $table->foreignId('id_driver')->references('id')->on('driver');
            $table->string('type_service')->comment('COLOCACAO|TROCA|REMOÇÃO');
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
        Schema::dropIfExists('driver_demand');
    }
}
