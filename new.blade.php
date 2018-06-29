@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Novo Curso                
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => '/courses', 'method' => 'post']) !!}
                        
                        {{ Form::label('name', 'Nome') }}
                        {{ Form::text('name') }}

                        <br /><br />

                        {{ Form::label('menu', 'Ementa') }}
                        {{ Form::text('menu') }}

                        <br /><br />
                        
                        {{ Form::label('amount', 'Alunos Máximos') }}
                        {{ Form::text('amount') }}

                        <br /><br />
                        

                        {{ Form::submit('Salvar') }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
