@extends('layouts.app')

@section('content')

<div class="card border-primary mb-3">
    <div class="card-header">Crear evento</div>

    <div class="card-body">
    
    <form action = "{{ action('EventController@update', $id)}}" method="POST">
        
        {{ csrf_field() }}
        
        <div class="container">
            <div class="jumbotron">
                <h1> Update your data</h1>
                <hr>
                
                <input type="hidden" name="_method" value="UPDATE" />
                <div class="form-group">
                    <label>Name of event</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Name" value="{{$events->title}}">
                </div>
                <div class="form-group">
                    <label>Color</label>
                    <input type="color" class="form-control" name="color" placeholder="Enter color" value="{{$events->color}}">
                </div>
                <div class="form-group">
                    <label>Start Date</label>
                    <input type="datetime-local" class="form-control" name="start_date" placeholder="Enter start date" value="{{$events->start_date}}">
                </div>
                <div class="form-group">
                    <label>End Date</label>
                    <input type="datetime-local" class="form-control" name="end_date" placeholder="Enter Name" value="{{$events->end_date}}">
                </div>
                {{method_field('PUT') }}
                
                <button type="submit" class="btn btn-success" name="submit">Update Data </button>            
            </div>
            
        </div>
        
    </form>
    </div>
</div>
@endsection
