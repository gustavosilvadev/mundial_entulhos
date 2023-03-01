<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblDumpsterService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dumpster_service', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_call_demand')->references('id')->on('call_demand');
            $table->foreignId('id_driver')->references('id')->on('driver');
            $table->integer('service_status')->default(0)->comment('1 - Em andamento | 2 - Finalizado');
            $table->dateTime('date_allocation_dumpster')->nullable(); // Data de alocação da caçamba
            $table->dateTime('date_removal_dumpster')->nullable(); // Data de retirada da caçamba == Data da Previsão de Retirada
            $table->dateTime('date_change_dumpster')->nullable(); // Data de troca da caçamba
            $table->timestamps(); // create_at - Data do início ao atendimento

        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dumpster_service');
    }
}
