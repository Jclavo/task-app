@extends('layouts.app')
@extends('layouts.auth') 
@extends('layouts.validation_message')

@section('content')

<div class="container">
	<h1>Edit the Task</h1>

<form method="POST" action="{{ route('tasks.update', $task->id) }}">
	 @method('PATCH') 
	
	<div class="form-group">
		<textarea name="description" class="form-control">{{$task->description }}</textarea>	
	</div>
	
	<div class="form-group">
			
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
		<button type="submit" name="update" class="btn btn-primary">Update task</button>
	</div>
{{ csrf_field() }}
</form>


</div>


@endsection