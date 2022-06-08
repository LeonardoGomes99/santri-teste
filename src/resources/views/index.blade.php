@extends('layout.base')
@section('title', 'santri')
@section('css-js')
<link href="{{ asset('static/css/index.css') }}" rel="stylesheet">
<script src="{{ asset('static/js/index.js') }}"></script>
@stop

    @section('content')
    <div id="login">
        <img id="logo-cliente" class="w3-margin-top"
            src="{{ asset('static/imagens/logo_cliente.jpg') }}" />
        <input id="form-login" class="w3-input w3-border w3-margin-top" type="text" placeholder="Usuário">
        <input id="form-password" class="w3-input w3-border w3-margin-top" type="password" placeholder="Senha">
        <button id="form-submit" class="w3-button w3-theme w3-margin-top w3-block">Logar</button>

        <a href="http://www.santri.com.br">
            <img id="logo-santri" class="w3-right w3-margin-top"
                src="{{ asset('static/imagens/logo_santri.svg') }}" />
        </a>
    </div>
    @stop
