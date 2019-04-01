@extends('layouts.app')

@section('content')

{{-- Link para los estilos de los iconos --}}

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

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<div class="card border-primary mb-3">
    <div class="card-header">Agregar Sala</div>

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
                <label for="tipo">Tipo de Sala</label>
                <select name="tipo" class="form-control">
                    @foreach($tipos_sala as $tipo)
                        <option value="{{ $tipo -> nombre }}">{{ $tipo -> nombre }}</option>
                    
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="capacidad">Capacidad de la sala</label>
                <input name="capacidad" name="capacidad" class="form-control" value="{{ old('capacidad') }}"></input>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Agregar sala</button>
            </div>

        </form>
    </div>
</div>

<form action="" method="get">

    <div class="card border-primary mb-3">
        <div class="card-header">Eliminar Sala</div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover ">
                <thead class="thead-dark">
                    <tr class="warning">
                        <th>Id</th>
                        <th>Tipo</th>
                        <th>Capacidad</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                @foreach($salas as $sala)
                <tbody>
                    <tr>
                        <td>{{ $sala->id }}</td>
                        <td>{{ $sala->tipo }}</td>
                        <td>{{ $sala->capacidad }}</td>

                        <th>
                            <form method="GET" action="{{action('Admin\SalaController@destroy', $sala['id'])}}">
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
