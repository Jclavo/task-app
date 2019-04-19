
@extends('layouts.app') 

@section('other_styles')
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
    
    <!--Styling for calendar-->
    
    <style>

    #calendar {
    max-width: 1000px;
    margin: 0 auto;
    }
    </style>

    
@stop

@section('content')

<!--
<div class="container">
	<form method="POST" class="form-inline" action="{{ route('tasks.store') }}">

		<div class="form-group">
			<label 	  for="level">Users:</label>
			<select class="form-control" name="level_id">
    			 @foreach($users as $user)
    				<option value="{{$user->id}}">{{$user->name}}</option>
    			@endforeach
			</select>
		</div>
		
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Add Task</button>
		</div>
		{{ csrf_field() }}
	</form>
</div>
<br>
 -->
<div id='calendar'></div>

@endsection


@section('other_scripts')
	
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() {
            // page is now ready, initialize the calendar...
            $('#calendar').fullCalendar({

            	<!--Header Section Including Previous,Next and Today-->
            	header: {
            	left: 'prev,next today',
            	center: 'title',
            	right: 'month,basicWeek,basicDay'
            	},

            	<!--Event Section-->
            	eventLimit: true, // allow "more" link when too many events
                
                // put your options and callbacks here
                events : [
                    @foreach($tasks as $task)
                    {
                        title : '{{ $task->description }}',
                        start : '{{ $task->start_date }}',
                        end   : '{{ $task->end_date }}'      
                    },
                    @endforeach
                ]
            })
        });
    </script>
@stop
