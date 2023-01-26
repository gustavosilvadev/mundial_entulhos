<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientInfoPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('client_info_payment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_call_demand')->references('id')->on('call_demand');
            $table->string('nf_receipt');
            $table->string('method_payment');
            $table->string('administrator');
            $table->string('note')->nullable();
            $table->string('email_emit_nf')->nullable();
            $table->string('phone')->nullable();
            $table->integer('deadline_payment')->default(0);
            $table->integer('deadline_nf_emission')->default(0);;
            $table->string('email_invoice_emit')->nullable();
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
        Schema::dropIfExists('client_info_payment');
    }
}
