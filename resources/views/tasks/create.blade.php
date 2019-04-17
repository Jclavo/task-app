@extends('layouts.app')
@extends('layouts.validation_message')

@section('content')

<div class="container">


	<h2>Add New Task</h2>

	<form method="POST" action="{{ route('tasks.store') }}">

		<div class="form-group">
			<textarea name="description" class="form-control"></textarea>
		</div>

		<div class="form-group">
			
			<select class="form-control" name="level_id">
    			 @foreach($levels as $level)
    				<option value="{{$level->id}}">{{$level->description}}</option>
    			@endforeach
			</select>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Add Task</button>
		</div>
		{{ csrf_field() }}
	</form>


</div>

@endsection
