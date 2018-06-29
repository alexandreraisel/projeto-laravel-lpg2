@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Curso
                    <a href="/courses/create" class="float-right btn btn-success">Novo Curso</a>
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
                            <th>Ementa</th>
                            <th>Alunos Máximos</th>
                        </tr>
                        
                        @foreach($courses as $c)
                            <tr>
                                <td>{{ $c->id}}</td>
                                <td>{{ $c->name}}</td>
                                <td>{{ $c->menu}}</td>
                                <td>{{ $c->amount}}</td>
                                <td>
                                    <a href="/courses/{{ $c->id }}/edit" class="btn btn-warning">Editar</a>

                                    {!! Form::open(['url' => "/courses/$c->id", 'method' => 'delete']) !!}
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
