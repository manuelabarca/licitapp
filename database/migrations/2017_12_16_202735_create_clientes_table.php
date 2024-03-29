<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idUsuario');
            $table->string('nombreEmpresaCliente');
            $table->string('correoContactoCliente');
            $table->string('encargadoEmpresaCliente');
            $table->string('rutEmpresaCliente');
            $table->string('rubroEmpresaCliente');
            $table->rememberToken();
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
        Schema::dropIfExists('clientes');
    }
}
