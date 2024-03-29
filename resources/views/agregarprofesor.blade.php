@extends('layouts.app')

@section('content')

{{-- Link para los estilos de los iconos --}}

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

@if(\Session::has('fail'))
<div class="alert alert-danger">
    <p>{{\Session::get('fail') }}</p>
</div>
@endif

@if(\Session::has('success'))
<div class="alert alert-success">
    <p>{{\Session::get('success') }}</p>
</div>
@endif

<div class="card border-primary mb-3">
    <div class="card-header">Agregar Profesor</div>

    <div class="card-body">
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="nombre">Nombre del profesor</label>
                <input name="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}"></input>
            </div>
            
            <div class="form-group">
                <label for="apellido">Apellido del profesor</label>
                <input name="apellido" name="apellido" class="form-control" value="{{ old('apellido') }}"></input>
            </div>

            <div class="form-group">
                <label for="departamento">Departamento</label>
                <input name="departamento" name="departamento" class="form-control" value="{{ old('departamento') }}"></input>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Agregar Profesor</button>
            </div>

        </form>
    </div>
</div>
<form action="" method="get">

    <div class="card border-primary mb-3">
        <div class="card-header">Eliminar Profesor</div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover ">
                <thead class="thead-dark">
                    <tr class="warning">
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Departamento</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                @foreach($profesores as $profesor)
                <tbody>
                    <tr>
                        <td>{{ $profesor->id }}</td>
                        <td>{{ $profesor->nombre }}</td>
                        <td>{{ $profesor->apellido }}</td>
                        <td>{{ $profesor->departamento }}</td>

                        <th>
                            <a href="/agregarprofesor/{{ $profesor-> id }}/eliminar" class="btn btn-danger" title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </a>
                        </th>

                    </tr>
                </tbody>
                @endforeach
            </table>

        </div>
    </div>
</form>




@endsection
