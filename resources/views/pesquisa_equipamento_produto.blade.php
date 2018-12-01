@extends('padrao.template')

@section('titulo', 'Incluir Manutenção')

@section('conteudo')
    <div class="col-md-8 offset-md-2 mt-2 mb-4">
        <div class="card text-white bg-secondary mb-3">
            <h5 class="card-header text-center">Filtro de Pesquisa de Equipamentos</h5>
            <div class="card-body">
                <form action="{{ route('relatorioEquipamentosProdutoFiltro') }}" method="post" accept-charset="utf-8">
                    <div class="form-group row">
                        <label for="id_nome" class="col-sm-2 col-form-label">Equipamento</label>
                        <div class="col-sm-10">
                            <select name="equipamento_id" class="form-control">
                                <option value="0">Selecione</option>
                                @if (isset($equipamentos) && !empty($equipamentos))
                                    @foreach ($equipamentos as $element)
                                        @if ($equipamento_id == $element->id)
                                            <option value="{{ $element->id }}" selected="true">{{ $element->nome }}</option>
                                        @else
                                            <option value="{{ $element->id }}">{{ $element->nome }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <input type="submit" value="Filtrar" class="btn btn-md btn-primary">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8 offset-md-2">
        @if (isset($manutencoes) && !empty($manutencoes))
            <div class="card border-primary">
                <h5 class="card-header text-center">Tabela de Manutenção de Equipamentos por Produtos</h5>
                <div class="card-body">
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
                </div>
            </div>
        @endif
    </div>
@endsection