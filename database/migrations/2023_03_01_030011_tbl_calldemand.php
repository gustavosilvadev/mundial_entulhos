<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblCalldemand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_demand', function (Blueprint $table) {
            
            $table->id();
            $table->foreignId('id_client')->references('id')->on('client');
            $table->integer('id_driver');
            $table->string('type_service')->comment('COLOCACAO|TROCA|REMOÇÃO');
            $table->string('address');
            $table->integer('number')->nullable();
            $table->string('zipcode');
            $table->string('city');
            $table->string('district');
            $table->string('state', 2);
            $table->string('comments')->nullable();
            $table->string('phone')->nullable();
            $table->decimal('price_unit', $precision = 8, $scale = 2);
            $table->integer('dumpster_total')->nullable();
            $table->integer('dumpster_total_opened')->nullable();
            $table->integer('dumpster_number')->default(0);
            $table->integer('id_landfill')->nullable();
            $table->string('period')->nullable(); // Período de retirada, remoção, troca
            $table->integer('service_status')->default(0)->comment('0 - Pendente | 1 - Em andamento | 2 - Finalizado');
            $table->dateTime('date_begin')->nullable(); // Data de ABERTURA do pedido
            $table->dateTime('date_end')->nullable(); // Data de finalização do pedido
            $table->dateTime('date_allocation_dumpster')->nullable(); // Data de alocação da caçamba
            $table->dateTime('date_removal_dumpster')->nullable(); // Data de retirada da caçamba == Data da Previsão de Retirada
            $table->dateTime('date_change_dumpster')->nullable(); // Data de troca da caçamba
            $table->dateTime('date_effective_removal_dumpster')->nullable(); // Data de retirada efetiva da caçamba
            $table->timestamps(); // create_at - Data do Pedido

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('call_demand');
    }
}
