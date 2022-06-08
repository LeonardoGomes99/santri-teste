@extends('layout.base')
@section('title', 'santri')
@section('css-js')
<link href="{{ asset('static/css/pesquisa_usuarios.css') }}" rel="stylesheet">
<script src="{{ asset('static/js/pesquisaUsuarios.js') }}"></script>
@stop

    @section('content')
    <div>
        <div id="lista_usuarios" class="w3-margin">
            <input id="search-nome" class="w3-input w3-border w3-margin-top" type="text" placeholder="Nome">
            <button id="search-button" class="w3-button w3-theme w3-margin-top">Buscar</button>
            @if(isset($autorizacoes['criacao']))
                <a href="{{ url('/usuario/create') }}"><button
                        class="w3-button w3-theme w3-margin-top w3-right">Cadastrar novo usuário</button></a>
            @else
                <button class="w3-button w3-theme w3-margin-top w3-right" disabled>Cadastrar novo usuário</button>
            @endif

            <table>
                <thead>
                    <tr>
                        <th>Nome</td>
                        <th>Login</td>
                        <th>Ativo</td>
                        <th>Opções</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>
    </div>

    @stop
