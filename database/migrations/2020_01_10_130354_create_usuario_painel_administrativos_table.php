<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioPainelAdministrativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_painel_administrativos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('primeiro_nome', 255);
            $table->string('segundo_nome', 255);
            $table->string('email');
            $table->string('usuario')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->bigInteger('permissao_id')->default(2)
                    ->references('id')
                    ->on('grupo_de_permissoes_painel_administrativos')
                    ->onDelete('cascade');
            $table->timestamps();
            $table->index('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_painel_administrativos');
    }
}
