<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblLandfill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landfill', function (Blueprint $table) {
            
            $table->id();
            $table->string('name');
            $table->string('email', 50)->nullable();
            $table->string('phone')->nullable();
            $table->string('cpf_cnpj')->nullable();
            $table->string('address')->nullable();
            $table->integer('number')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('state', 2)->nullable();            
            $table->boolean('flg_status')->default(1);
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
        Schema::dropIfExists('landfill');
    }
}
