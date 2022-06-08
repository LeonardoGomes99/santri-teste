<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateVwAutorizacoesView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW `vw_autorizacoes` AS select 'cadastrar_clientes' AS `CHAVE`,'Cadastrar clientes' AS `DESCRICAO` union all select 'excluir_clientes' AS `CHAVE`,'Excluir clientes' AS `DESCRICAO` union all select 'cadastrar_fornecedores' AS `CHAVE`,'Cadastrar fornecedores' AS `DESCRICAO` union all select 'excluir_fornecedores' AS `CHAVE`,'Excluir fornecedores' AS `DESCRICAO` union all select 'cadastrar_produtos' AS `CHAVE`,'Cadastrar produtos' AS `DESCRICAO` union all select 'alterar_preco_produtos' AS `CHAVE`,'Alterar preço de produtos' AS `DESCRICAO`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `vw_autorizacoes`");
    }
}
