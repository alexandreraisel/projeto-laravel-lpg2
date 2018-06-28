@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Estados
                    <a style="margin-left: 10px" href="/states/create" class="float-right btn btn-success">Novo Estado</a>
                    <a href="/cities/create" class="float-right btn btn-success">Nova Cidade</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Sigla</th>
                            <th>Ações</th>
                        </tr>
                        
                        @foreach($states as $s)
                            <tr>
                                <td>{{ $s->id }}</td>
                                <td>{{ $s->nome }}</td>
                                <td>{{ $s->sigla }}</td>
                                <td>
                                    <a href="/states/{{ $s->id }}/edit" class="btn btn-warning">Editar</a>

                                    {!! Form::open(['url' => "/states/$s->id", 'method' => 'delete']) !!}
                                        {{ Form::submit('Deletar', ['class' => 'btn btn-danger']) }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
