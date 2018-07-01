@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Editar Curso                  
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => "/courses/$course->id", 'method' => 'put']) !!}
                    
                        {{ Form::label('name', 'Nome') }}
                        {{ Form::text('name', $course->name) }}

                        <br /><br />

                        {{ Form::label('menu', 'Ementa') }}
                        {{ Form::text('menu', $course->menu) }}

                        <br /><br />

                        {{ Form::label('amount', 'Alunos Máximos') }}
                        {{ Form::text('amount', $course->amount) }}

                        <br /><br />

                        {{ Form::submit('Salvar') }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
