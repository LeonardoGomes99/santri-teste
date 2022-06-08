@extends('layout.base')
@section('title', 'santri')
@section('css-js')
<link href="{{ asset('static/css/pesquisa_usuarios.css') }}" rel="stylesheet">
@stop

    @section('content')
    @foreach($usuario as $data)
    <div>
    <div id="lista_usuarios" class="w3-margin">

      <h4>Edição de usuários</h4>

      <div>
        <h3 id="form-id">Usuário {{ $data->USUARIO_ID }}</h3>
      </div>

      <div>
        <label>Nome</label>
        <input id="form-nome" type="text" class="w3-input w3-block w3-border" value="{{ $data->NOME_COMPLETO }}">
      </div>

      <div>
        <label>Login</label>
        <input id="form-login" type="text" class="w3-input w3-block w3-border" value="{{ $data->LOGIN }}">
      </div>

      <div>
        <label>Ativo</label>
        <input id="form-ativo" type="text" class="w3-input w3-block w3-border" placeholder="Digite S para Sim ou N para Não" value="{{ $data->ATIVO }}">
      </div>

      <div>
        <label>Senha</label>
        <input id="form-senha" type="password" class="w3-input w3-block w3-border" placeholder="" value="{{ $data->SENHA }}">
      </div>

      <div>
      @if(isset($autorizacoes["criacao"]))
        <input id="opt_cadastrar_clientes" type="checkbox" value="cadastrar_clientes" checked> <label>Cadastrar clientes</label>
      @else
        <input id="opt_cadastrar_clientes" type="checkbox" value="cadastrar_clientes"> <label>Cadastrar clientes</label>
      @endif
      <br>
      @if(isset($autorizacoes['exclusao']))
        <input id="opt_excluir_clientes" type="checkbox" value="excluir_clientes" checked> <label>Excluir clientes</label>
      @else
      <input id="opt_excluir_clientes" type="checkbox" value="excluir_clientes"> <label>Excluir clientes</label>
      @endif
      <br>
      @if(isset($autorizacoes['edicao']))
        <input id="opt_editar_clientes" type="checkbox" value="editar_clientes" checked> <label>Editar clientes</label>
      @else
        <input id="opt_editar_clientes" type="checkbox" value="editar_clientes"> <label>Editar clientes</label>
      @endif
      <br>
      </div>

      <div>
      <button id="form-submit" name="{{ $data->USUARIO_ID }}" class="w3-button w3-theme w3-margin-top">Alterar</button>
      </div>

    </div>
  </div>
  @endforeach
@stop