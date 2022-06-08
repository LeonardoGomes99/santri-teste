<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('USUARIO_ID');
            $table->string('LOGIN', 30)->unique('IDX_USUARIOS_LOGIN');
            $table->string('SENHA', 30);
            $table->string('ATIVO', 1)->default('S');
            $table->string('NOME_COMPLETO', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
