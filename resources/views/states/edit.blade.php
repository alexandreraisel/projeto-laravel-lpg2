@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Editar Estado                   
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => "/states/$state->id", 'method' => 'put']) !!}
                        
                        {{ Form::label('nome', 'Nome') }}
                        {{ Form::text('nome', $state->nome) }}

                        <br /><br />

                        {{ Form::label('sigla', 'Sigla') }}
                        {{ Form::text('sigla', $state->sigla) }}

                        <br /><br />

                        {{ Form::submit('Salvar') }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
