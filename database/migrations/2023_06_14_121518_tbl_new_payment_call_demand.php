<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblNewPaymentCallDemand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_call_demand', function (Blueprint $table) {

            $table->id();
            $table->foreignId('id_call_demand_reg')->references('id')->on('call_demand'); // ID da TABELA
            $table->integer('id_call_demand')->references('id_demand')->on('call_demand'); // ID do PEDIDO
            $table->decimal('iss', $precision = 8, $scale = 2)->nullable(); // IMPOSTO ISS
            $table->boolean('has_paid')->default(0); // Pago SIM/NAO
            $table->boolean('by_bank_transfer')->nullable(); // Pago por transferência bancária SIM/NAO
            $table->boolean('by_bank_slip')->nullable(); // Pago por boleto bancário SIM/NAO
            $table->integer('invoice_number')->nullable(); // NÚMERO DA NOTA FISCAL
            $table->dateTime('date_issue')->nullable()->nullable(); // DATA DA EMISSÃO 
            $table->dateTime('date_payment_forecast')->nullable(); // DATA DE PREVISÃO DE PAGAMENTO
            $table->dateTime('date_effective_paymen')->nullable(); // DATA DE PAGAMENTO EFETIVO
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
        Schema::dropIfExists('payment_call_demand');
    }
}
