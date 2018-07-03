@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/admin" class="btn btn-warning">Administrador</a>
                    <a href="/enrollmentUser" class="btn btn-warning">Matricular-se</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
