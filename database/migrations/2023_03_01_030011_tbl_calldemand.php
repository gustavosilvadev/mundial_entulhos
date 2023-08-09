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
            $table->integer('id_demand');
            $table->string('type_service')->comment('COLOCACAO|TROCA');
            $table->boolean('dumpster_allocation')->default(0);
            $table->boolean('dumpster_replacement')->default(0);
            $table->boolean('dumpster_removal')->default(0);

            $table->string('period')->nullable(); // PERÍODO DO DIA +++ DIURNO/NOTURNO

            $table->dateTime('date_start')->nullable(); // DATA NO MOMENTO QUE INICIA O SERVIÇO PELO MOTORISTA
            $table->dateTime('date_allocation_dumpster')->nullable(); // DATA DO PEDIDO SELECIONADO PELO CLIENTE (ALOCAÇÃO/TROCA)
            $table->dateTime('date_removal_dumpster_forecast')->nullable(); // DATA DE PREVISÃO DE RETIRADA - PARA ADICIONAR A DATA PREVISTA DE ACORDO COM OS DIAS DO MUNICÍPIO
            $table->dateTime('date_effective_removal_dumpster')->nullable(); // DATA RETIRADA EFETIVA - PARA ADICIONAR DATA QUANDO O MOTORISTA RETIROU A CAÇAMBA

            $table->integer('id_parent')->default(0); // ID RELACIONADO AO CHAMADO ANTERIOR - É PREENCHIDO SOMENTE SE O ANTERIOR NÃO ESTIVER FINALIZADO E USUÁRIO RELACIONAR
            $table->string('name'); // NOME DO CLIENTE
            $table->string('address');
            $table->string('number');
            $table->string('zipcode');
            $table->string('city');
            $table->string('district');
            $table->string('state', 2);

            $table->string('phone')->nullable();
            $table->decimal('price_unit', $precision = 8, $scale = 2)->nullable();
            $table->string('comments')->nullable();
            $table->integer('dumpster_sequence_demand')->default(0); // Sequencia de pedido de acordo com a quantidade de caçambas
            $table->integer('dumpster_quantity')->nullable(); // QUANTIDADE DE CAÇAMBAS
            $table->integer('dumpster_number')->default(0); // NÚMERO DA CAÇAMBA
            $table->integer('dumpster_number_substitute')->default(0); // NÚMERO DA CAÇAMBA SUBSTITUTA
            $table->integer('days_allocation')->default(0); // QUANTIDADE DE DIAS
            
            $table->integer('id_landfill')->nullable(); // ID DO ATERRO ++++ PARA NÃO SER OBRIGATÓRIO, O ADM E MOTORISTA DEVEM PREENCHER ESTE CAMPO || O MOTORISTA DEVE OBRIGATORIAMENTE SELECIONAR O ATERRO NO ATO DA RETIRADA 

            $table->integer('id_driver')->nullable(); // MOTORISTA
            $table->integer('service_status')->default(0)->comment('0 - Pendente | 1 - OK');
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
