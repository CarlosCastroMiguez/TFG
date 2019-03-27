@extends('layouts.app')

@section('content')

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
                    <option value="Consulta">Consulta</option>
                    <option value="SimulaciónCompleja">Simulación Compleja</option>
                    <option value="TaskTraining">Task Training</option>
                    <option value="Hospitalización">Hospitalización</option>
                    <option value="Farmacia">Farmacia</option>
                    <option value="Quirófano">Quirófano</option>
                    <option value="FarmaciaComunitaria">Farmacia comunitaria</option>
                    <option value="Ambulancia">Ambulancia</option>
                </select>
            </div>

            <div class="form-group">
                <label for="capacidad">Capacidad de la sala</label>
                <input name="capacidad" name="capacidad" class="form-control" value="{{ old('capacidad') }}" required></input>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Agregar sala</button>
            </div>


        </form>

    </div>

</div>
@endsection
