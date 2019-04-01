@extends('layouts.app')

@section('content')

{{-- Link para los estilos de los iconos --}}

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

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
                        <th>Departamento</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                @foreach($profesores as $profesor)
                <tbody>
                    <tr>
                        <td>{{ $profesor->id }}</td>
                        <td>{{ $profesor->nombre }}</td>
                        <td>{{ $profesor->departamento }}</td>

                        <th>
                            <form method="GET" action="{{action('Admin\ProfesorController@destroy', $profesor['id'])}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE" />
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </form>
                        </th>

                    </tr>
                </tbody>
                @endforeach
            </table>

        </div>
    </div>
</form>




@endsection
