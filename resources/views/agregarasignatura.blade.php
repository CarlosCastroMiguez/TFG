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
    <div class="card-header">Agregar Asignatura</div>

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
                <label for="nombre">Nombre de la asignatura</label>
                <input name="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}"></input>
            </div>

            <div class="form-group">
                <label for="codigo">Codigo</label>
                <input name="codigo" name="codigo" class="form-control" value="{{ old('codigo') }}"></input>
            </div>

            <div class="form-group">
                <label for="grado">Grado</label>
                <input name="grado" name="grado" class="form-control" value="{{ old('grado') }}"></input>
            </div>

            <div class="form-group">
                <label for="curso">Curso</label>
                <select name="curso" class="form-control">
                    <option value="1">1º</option>
                    <option value="2">2º</option>
                    <option value="3">3º</option>
                    <option value="4">4º</option>
                    <option value="5">5º</option>
                    <option value="6">6º</option>
                </select>
            </div>

            <div class="form-group">
                <label for="grupo">Grupo</label>
                <input name="grupo" name="grupo" class="form-control" value="{{ old('grupo') }}"></input>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Agregar Asignatura</button>
            </div>

        </form>
    </div>
</div>
<form action="" method="get">

    <div class="card border-primary mb-3">
        <div class="card-header">Eliminar Asignatura</div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover ">
                <thead class="thead-dark">
                    <tr class="warning">
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Codigo</th>
                        <th>Grado</th>
                        <th>Curso</th>
                        <th>Grupo</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                @foreach($asignaturas as $asignatura)
                <tbody>
                    <tr>
                        <td>{{ $asignatura->id }}</td>
                        <td>{{ $asignatura->nombre }}</td>
                        <td>{{ $asignatura->codigo }}</td>
                        <td>{{ $asignatura->grado }}</td>
                        <td>{{ $asignatura->curso }}</td>
                        <td>{{ $asignatura->grupo }}</td>

                        <th>
                            <form method="GET" action="{{action('Admin\AsignaturaController@destroy', $asignatura['id'])}}">
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
