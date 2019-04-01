@extends('layouts.app')

@section('content')

<div class="card border-primary mb-3">
    <div class="card-header">Crear evento</div>

    <div class="card-body">
        <form method="POST" action="{{action('EventController@store')}}">
           
            {{-- este campo protege contra ataques csrf (falsificación de petición en sitios cruzados) --}}
           
            {{csrf_field() }}

            <div class="form-group">
                <label for="">Enter Name of Event</label>
                <input type="text" class="form-control" name="title" placeholder="Enter the name" required/> <br /><br />
            </div>
            <div class="form-group">
                <label for="">Enter color</label>
                <input type="color" class="form-control" name="color" placeholder="Enter the color" required/> <br /><br />
            </div>
            <div class="form-group">
                <label for="">Enter start Date of event</label>
                <input type="datetime-local" class="form-control" name="start_date" class="date" placeholder="Enter the Start date" required/> <br /><br />
            </div>
            <div class="form-group">
                <label for="">Enter end Date of event</label>
                <input type="datetime-local" class="form-control" name="end_date" class="date" placeholder="Enter the end date" required/> <br /><br />
            </div>

            <input type="submit" class="btn btn-primary" name="submit" value="Add event data" />
                        
            <a href="/calendar" class ="btn btn-info" > Back </a>
                        
        </form>
    </div>
</div>
@endsection
