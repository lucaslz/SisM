<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('tituloPagina')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-info" style="background-color: #63B8FF;">
        <a class="navbar-brand" href="{{ route('principal') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBarManutencao" aria-controls="navBarManutencao" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('principal') }}">Página Principal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('geral') }}">Área Geral</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Área do Administrador
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('incluirEquipamento') }}">Incluir Equipamento</a>
                      <a class="dropdown-item" href="{{ route('incluirManutencao') }}">Incluir Manutenção</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ route('relatorioEquipamentosCadastrados') }}">Equipamento cadastrados</a>
                      <a class="dropdown-item" href="{{ route('relatorioEquipamentosProduto') }}">Pesquisar Manuteção de Equipamento</a>
                </div>
            </li>
        </ul>
    </nav>
</header>
<body>
    <div class="container" id="app">
        <div class="row mt-4">
            @yield('conteudo')
        </div>
    </div> 
    <script src="{{ asset('js/app.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/all.js') }}" type="text/javascript" charset="utf-8"></script>
</body>
</html>