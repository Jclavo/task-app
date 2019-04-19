@extends('layouts.app')
@extends('layouts.auth') 
@extends('layouts.validation_message')

@section('content')

<div class="container">


	<h2>Add New Task</h2>

	<form method="POST" action="{{ route('tasks.store') }}">

		<div class="form-group">
			<label 	  for="description">Description:</label>
			<textarea name="description" class="form-control"></textarea>
		</div>

		<div class="form-group">
			<label 	  for="level">Level:</label>
			<select class="form-control" name="level_id">
    			 @foreach($levels as $level)
    				<option value="{{$level->id}}">{{$level->description}}</option>
    			@endforeach
			</select>
		</div>
		
		<div class="form-group">
			<label for="start_date">Start date:</label>
			<input name="start_date" class="form-control" type="date"></textarea>
		</div>
		
		<div class="form-group">
			<label for="end_date">End date:</label>
			<input name="end_date" class="form-control" type="date"></textarea>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Add Task</button>
		</div>
		{{ csrf_field() }}
	</form>


</div>

@endsection
