<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblActivityUserDemandDumpster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_user_demand_dumpster', function (Blueprint $table) {

            $table->id();
            $table->foreignId('id_call_demand_reg')->references('id')->on('call_demand');
            $table->integer('id_call_demand')->references('id_demand')->on('call_demand');
            $table->foreignId('id_employee')->references('id')->on('employee');
            $table->string('type_service')->comment('COLOCACAO|TROCA|RETIRADA');
            $table->string('service_status')->comment('1 - INICIAR ALOCACAO | 2 - ALOCADO| 3 - INICIAR REMOCAO| 4 - REMOVIDO| 5 - ENCERRADO');
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
        Schema::dropIfExists('activity_user_demand_dumpster');
    }
}
