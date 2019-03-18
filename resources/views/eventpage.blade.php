@extends('layouts.app')
@section('content')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/locale/es.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css" />

<script src="https://unpkg.com/@fullcalendar/core@4.0.1/main.js"></script>
<script src="https://unpkg.com/@fullcalendar/timegrid@4.0.1/main.js"></script>
<script src="https://unpkg.com/@fullcalendar/resource-common@4.0.1/main.js"></script>
<script src="https://unpkg.com/@fullcalendar/resource-timegrid@4.0.1/main.js"></script>
@if(count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

@if(\Session::has('success'))
<div class="alert alert-success">
    <p>{{\Session::get('success') }}</p>
</div>
@endif


<div class="card border-primary mb-3">
    <div class="card-header">Event Calendar</div>
    <div class="card-body">
        {!! $calendar->calendar() !!}
        {!! $calendar->script() !!}
    </div>
</div>

@endsection
