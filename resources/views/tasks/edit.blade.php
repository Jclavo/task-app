@extends('layouts.app')
@extends('layouts.auth') 
@extends('layouts.validation_message')

@section('content')

<div class="container">
	<h1>Edit the Task</h1>

<form method="POST" action="{{ route('tasks.update', $task->id) }}">
	 @method('PATCH') 
	
	<div class="form-group">
		<label 	  for="description">Description:</label>
		<textarea name="description" class="form-control">{{$task->description }}</textarea>	
	</div>
	
	<div class="form-group">
			<label 	  for="level">Level:</label>
			<select class="form-control" name="level_id">
    			 @foreach($levels as $level)
    			 	@if($level->id == $task->level_id )
    			 		<option value="{{$level->id}}" selected>{{$level->description}}</option>
    			 	@else
    			 		<option value="{{$level->id}}">{{$level->description}}</option>
    			 	@endif
    				
    			@endforeach
			</select>
		</div>
	
	<div class="form-group">
			<label for="start_date">Start date:</label>
			<input name="start_date" class="form-control" type="date" value="{{$task->start_date}}"></textarea>
	</div>
			
	<div class="form-group">
			<label for="end_date">End date:</label>
			<input name="end_date" class="form-control" type="date" value="{{$task->end_date}}"></textarea>
		</div>
	
	<div class="form-group">
		<button type="submit" name="update" class="btn btn-primary">Update task</button>
	</div>
{{ csrf_field() }}
</form>


</div>


@endsection