@extends('layouts.app')
@extends('layouts.validation_message')

@section('content')

<div class="container">
	

	<h2>Add New level</h2>

	<form method="POST" action="{{ route('levels.store') }}">

		<div class="form-group">
			<input name="description" class="form-control"></input>
		</div>


		<div class="form-group">
			<button type="submit" class="btn btn-primary">Add level</button>
		</div>
		{{ csrf_field() }}
	</form>


</div>

@endsection