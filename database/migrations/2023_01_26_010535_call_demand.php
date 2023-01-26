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
            // $table->unsignedinteger('id_client');
            $table->foreignId('id_client')->references('id')->on('client');
            $table->string('service_type')->comment('COLOCACAO|TROCA');
            $table->string('work_address');
            $table->string('work_district');
            $table->string('comments')->nullable();
            $table->string('phone')->nullable();
            $table->decimal('price_unit', $precision = 8, $scale = 2);
            $table->boolean('payment_status')->default(0);
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
