@extends('padrao.template')

@section('titulo', 'Incluir Equipamento')

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
    <div class="col-md-8 offset-md-2">
        <div class="card bg-light mb-3">
            <div class="card-header text-center">Inclusão de Equipamentos !</div>
            <div class="card-body">
                <form action="{{ route('incluirEquipamentoValidar') }}" method="post" accept-charset="utf-8">
                    <div class="form-group row">
                        <label for="id_nome" class="col-sm-2 col-form-label">Equipamento</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_nome" name="nome">
                        </div>
                    </div>
                    <input type="submit" value="Incluir" class="btn btn-md btn-primary">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>            
            </div>
        </div>
    </div>
@endsection