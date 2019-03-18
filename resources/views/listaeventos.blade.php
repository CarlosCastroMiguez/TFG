@extends('layouts.app')

@section('content')

{{-- Link para los estilos de los iconos --}}

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<div class="card border-primary mb-3">
    <div class="card-header">Listar Eventos</div>

    <div class="card-body">
        <div class="container">
            <table class="table table-bordered table-striped table-hover ">
                <thead class="thead-dark">
                    <tr class="warning">
                        <th>Id</th>
                        <th>Title</th>
                        <th>Color</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Update / Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                @foreach($events as $event)
                <tbody>
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->color }}</td>
                        <td>{{ $event->start_date }}</td>
                        <td>{{ $event->end_date }}</td>

                        <th><a href="{{action('EventController@edit', $event['id'])}}" class="btn btn-success">Edit</a>
                        </th>

                        <th>
                            <form method="POST" action="{{action('EventController@destroy', $event['id'])}}">
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
</div>
@endsection
