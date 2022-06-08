<?php

namespace App\Traits;

use Validator;
use App\Models\Autorizacoes;


trait CheckAuth {

    public function getAuths()
    {
        $Autorizacoes = new Autorizacoes();
        $authOptions =  $Autorizacoes->findAll(session('USUARIO_ID'));

        //dd($authOptions);

        $authFiltered = []; 
        foreach($authOptions as $key=>$value){

            if($value['CHAVE_AUTORIZACAO'] === "cadastrar_clientes")
            {
                $authFiltered['criacao'] = true;
            }

            if($value['CHAVE_AUTORIZACAO'] === "excluir_clientes"){
                $authFiltered['exclusao'] = true;
            }

            if($value['CHAVE_AUTORIZACAO'] == "editar_clientes"){
                $authFiltered['edicao'] = true;
            }
        }

        return $authFiltered;
    }

    public function getAuthsToEdit($id)
    {
        $Autorizacoes = new Autorizacoes();
        $authOptions =  $Autorizacoes->findAll($id);

        $authFiltered = []; 
        foreach($authOptions as $key=>$value){
            if($value['CHAVE_AUTORIZACAO'] == "cadastrar_clientes")
            {
                $authFiltered['criacao'] = true;
            }

            if($value['CHAVE_AUTORIZACAO'] == "excluir_clientes"){
                $authFiltered['exclusao'] = true;
            }

            if($value['CHAVE_AUTORIZACAO'] == "editar_clientes"){
                $authFiltered['edicao'] = true;
            }
        }

        return $authFiltered;
    }

    public function checkRequest($request)
    {
        $validation = $request->validate([
            'USUARIO_ID' => 'required',
            'LOGIN' => 'required',
            'ATIVO' => 'required',
            'SENHA' => 'required',
            'NOME_COMPLETO' => 'required',
            'AUTHS.criar' => 'required',
            'AUTHS.editar' => 'required',
            'AUTHS.excluir' => 'required',
        ]);

        return $validation;
    }

}