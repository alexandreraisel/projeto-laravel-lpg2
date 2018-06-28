@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Nova Cidade                 
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => '/cities', 'method' => 'post']) !!}
                        
                        {{ Form::label('nome', 'Nome') }}
                        {{ Form::text('nome') }}

                        <br /><br />

                        {{ Form::label('num_habit', 'Habitantes') }}
                        {{ Form::text('num_habit') }}

                        <br /><br />
                        
                        {{ Form::label('states', 'Estados') }}
                        {{ Form::select('states', $states) }}

                        <br /><br />
                        

                        {{ Form::submit('Salvar') }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
