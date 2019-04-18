@extends('layouts.app')
@extends('layouts.auth') 
@extends('layouts.validation_message')

@section('content')

<div class="container">
	<h1>Edit the level</h1>

<form method="POST" action="{{ route('levels.update', $level->id) }}">
	 @method('PATCH') 
	<div class="form-group">
		<textarea name="description" class="form-control">{{$level->description }}</textarea>	
	</div>


	<div class="form-group">
		<button type="submit" name="update" class="btn btn-primary">Update level</button>
	</div>
{{ csrf_field() }}
</form>


</div>


@endsection