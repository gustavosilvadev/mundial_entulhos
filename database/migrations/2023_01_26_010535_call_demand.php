<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CallDemand extends Migration
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
            $table->string('type_service')->comment('COLOCACAO|TROCA');
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
            $table->string('period')->nullable();
            $table->boolean('payment_status')->default(0);
            $table->integer('service_status')->default(0)->comment('0 - Pendente | 1 - Atendimento | 2 - Finalizado');
            $table->dateTime('date_begin')->nullable();
            $table->dateTime('date_end')->nullable();
            $table->dateTime('date_effective_withdrawal')->nullable();
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
        Schema::dropIfExists('call_demand');
    }
}
