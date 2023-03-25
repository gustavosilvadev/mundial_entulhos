<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblCountyDaysDumpster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_county_days_dumpster', function (Blueprint $table) {
            $table->id();
            $table->integer('cod_county');
            $table->string('name_county')->nullable();
            $table->integer('cod_uf');
            $table->string('name_uf')->nullable();
            $table->integer('days');
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
        Schema::dropIfExists('tbl_county_days_dumpster');
    }
}
