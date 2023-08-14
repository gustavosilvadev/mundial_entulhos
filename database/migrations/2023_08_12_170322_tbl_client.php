<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // NOME DO CLIENTE
            $table->string('address');
            $table->string('address_complement')->nullable();
            $table->string('number');
            $table->string('zipcode');
            $table->string('city');
            $table->string('district');
            $table->string('state', 2)->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('client');
    }
}
