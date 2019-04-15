@extends('layouts.app')

@section('content')

<div class="container">
	@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

	<h2>Add New Task</h2>

	<form method="POST" action="{{ route('tasks.store') }}">

		<div class="form-group">
			<textarea name="description" class="form-control"></textarea>
		</div>


		<div class="form-group">
			<button type="submit" class="btn btn-primary">Add Task</button>
		</div>
		{{ csrf_field() }}
	</form>


</div>

@endsection