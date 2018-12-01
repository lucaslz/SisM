@extends('padrao.template')

@section('titulo', 'Incluir Manutenção')

@section('conteudo')
    {{-- Exibicao de erros --}}
    <div class="col-md-6 offset-md-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    {{-- Exibicao de mensagens de controle --}}
    <div class="col-md-6 offset-md-3">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @elseif(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="col-md-10 offset-md-1">
        <div class="card bg-light mb-3">
            <div class="card-header text-center">Inclusão de Manutenção !</div>
            <div class="card-body">
                <form action="{{ route('incluirManutencaoValidar') }}" method="post" accept-charset="utf-8">
                    <div class="form-group row">
                        <label for="equipamento_id" class="col-sm-2 col-form-label">Equipamento</label>
                        <div class="col-sm-10">
                            <select name="equipamento_id" class="form-control" id="equipamento_id">
                                <option value="0">Selecione</option>
                                @foreach ($equipamento as $element)
                                    <option value="{{ $element['id'] }}">{{ $element['nome'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipo" class="col-sm-2 col-form-label">Tipo Manutenção</label>
                        <div class="col-sm-10">
                            <select name="tipo" class="form-control" id="tipo">
                                <option value="0">Selecione</option>
                                @foreach ($tipoManutencao as $k => $v)
                                    <option value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="datalimite" class="col-sm-2 col-form-label">Data Limite</label>
                        <div class="col-sm-10">
                            <input type="date" name="datalimite" class="form-control" id="datalimite">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descricao" class="col-sm-2 col-form-label">Descricao</label>
                        <div class="col-sm-10">
                            <input type="text" name="descricao" class="form-control" id="descricao" placeholder="Descricao">
                        </div>
                    </div>
                    <input type="submit" value="Incluir" class="btn btn-md btn-primary">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>            
            </div>
        </div>
    </div>
@endsection