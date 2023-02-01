<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('surname', 30);            
            $table->string('email', 50);
            $table->string('login', 50);
            $table->longText('password');
            $table->integer('access_permission')->default(0)->comment('0 - sem permissao | 1 - acesso leitura | 2 - acesso admin');
            $table->string('phone')->nullable();
            $table->string('cpf_cnpj')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
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
        Schema::dropIfExists('employee');
    }
}
