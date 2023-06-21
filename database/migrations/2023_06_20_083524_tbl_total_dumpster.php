<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblTotalDumpster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_dumpster', function (Blueprint $table) {
            $table->id();
            $table->integer('number_total')->default(0);
            $table->integer('number_available')->default(0);
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
        Schema::dropIfExists('total_dumpster');
    }
}
