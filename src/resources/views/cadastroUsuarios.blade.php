@extends('layout.base')
@section('title', 'santri')
@section('css-js')
<link href="{{ asset('static/css/pesquisa_usuarios.css') }}" rel="stylesheet">
<script src="{{  asset('static/js/cadastrarUsuarios.js') }}"></script>
@stop

    @section('content')
    <div>
    <div id="lista_usuarios" class="w3-margin">

      <h4>Cadastro de usuários</h4>

      <div>
        <h3 id="form-id">Usuário {{ $id }}</h3>
      </div>

      <div>
        <label>Nome</label>
        <input id="form-nome" type="text" class="w3-input w3-block w3-border">
      </div>

      <div>
        <label>Login</label>
        <input id="form-login" type="text" class="w3-input w3-block w3-border">
      </div>

      <div>
        <label>Ativo</label>
        <input id="form-ativo" type="text" class="w3-input w3-block w3-border" placeholder="Digite S para Sim ou N para Não">
      </div>

      <div>
        <label>Senha</label>
        <input id="form-senha" type="password" class="w3-input w3-block w3-border" placeholder="">
      </div>

      <ul>
        <li><input id="opt_cadastrar_clientes" type="checkbox" value="cadastrar_clientes" checked> <label>Cadastrar clientes</label></li>
        <li><input id="opt_excluir_clientes" type="checkbox" value="excluir_clientes"> <label>Excluir clientes</label></li>
        <li><input id="opt_editar_clientes" type="checkbox" value="editar_clientes"> <label>Editar clientes</label></li>
      </ul>

      <button id="form-submit" name="{{ $id }}" class="w3-button w3-theme w3-margin-top w3-margin-bottom">Gravar</button>
      <button class="w3-button w3-margin-top w3-margin-bottom w3-right">Cancelar</button>

    </div>
  </div>
    @stop