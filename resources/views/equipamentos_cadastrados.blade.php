@extends('padrao.template')

@section('titulo', 'Incluir Manutenção')

@section('conteudo')
    <div class="col-md-10 offset-md-1">
        <div class="card bg-light mb-3">
            <div class="card-header text-center">Relatório de Equipamentos Cadastrados !</div>
            <div class="card-body">
                @if (!empty($equipamentos))
                    <table class="table text-center table-hover" id="tabelaGeral">
                        <thead>
                            <tr class="table-success">
                                <th>id</th>
                                <th>Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipamentos as $element)
                                <tr>
                                    <td>{{ $element->id }}</td>
                                    <td>{{ $element->nome }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h3 class="text-center">Nenhum equipamento cadastrado.</h3>
                @endif
            </div>
        </div>        
    </div>
@endsection