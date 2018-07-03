@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Cursos Disponíveis
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
                            <th>Curso</th>
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
                                    <a href="/enrollment/{{ $c->id }}" class="btn btn-success">Matricular-se</a>
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
