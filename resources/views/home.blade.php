@extends('padrao.template')

@section('titulo', 'Home')

@section('conteudo')
    <div class="col-md-12">
        <div class="card bg-light mb-3">
            <div class="card-header text-center">Relatório de Manutenções Cadastradas no Sistema !</div>
            <div class="card-body">
                @if (!empty($manutencoes))
                    <table class="table text-center table-hover" id="tabelaGeral">
                        <thead>
                            <tr class="table-success">
                                <th>Nome Equipamento</th>
                                <th>Descrição</th>
                                <th>Data Limite</th>
                                <th>Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($manutencoes as $element)
                                <tr>
                                    <td>{{ $element->nomeEquipamento }}</td>
                                    <td>{{ $element->descricao }}</td>
                                    <td>{{ $element->datalimite }}</td>
                                    <td>{{ $element->tipo }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h3 class="text-center">Nenhuma cadastrada recentemente.</h3>
                @endif            
            </div>
        </div>
    </div>
@endsection