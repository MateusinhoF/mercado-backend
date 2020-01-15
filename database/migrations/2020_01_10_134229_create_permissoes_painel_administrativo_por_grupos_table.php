<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissoesPainelAdministrativoPorGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissoes_painel_administrativo_por_grupos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('permissao_id')
                ->unique()
                ->references('id')
                ->on('grupo_de_permissoes_painel_administrativos')
                ->onDelete('cascade');
            $table->tinyInteger('user_create')->default(0);
            $table->tinyInteger('user_update')->default(0);
            $table->tinyInteger('user_view')->default(0);
            $table->tinyInteger('user_disable')->default(0);
            $table->tinyInteger('user_delete')->default(0);
            $table->tinyInteger('group_create')->default(0);
            $table->tinyInteger('group_update')->default(0);
            $table->tinyInteger('group_view')->default(0);
            $table->tinyInteger('group_disable')->default(0);
            $table->tinyInteger('mercado_create')->default(0);
            $table->tinyInteger('mercado_update')->default(0);
            $table->tinyInteger('mercado_view')->default(0);
            $table->tinyInteger('mercado_disable')->default(0);
            $table->tinyInteger('mercado_delete')->default(0);
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
        Schema::dropIfExists('permissoes_painel_administrativo_por_grupos');
    }
}
