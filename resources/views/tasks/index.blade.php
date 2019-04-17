@extends('layouts.app') 
@extends('layouts.alert_message') 

@section('content')

<div class="container">

	<h2>Tasks List</h2>
	<a href="{{ route('tasks.create')}}" class="btn btn-primary">Add new Task</a>
	<table class="table">
		<thead>
			<tr>
				<td >Task</td>
				<td >Level</td>
				<td colspan = 2>Actions</td>
			</tr>
		</thead>
		<tbody>
			@foreach($user->tasks as $task)
			<tr>
				<td>{{$task->description}}</td>
				<td>{{$task->level->description}}</td>
				<td>
					 <a href="{{ route('tasks.edit',$task->id)}}" class="btn btn-primary">Edit</a>
				</td>	
				<td>
                    <form action="{{ route('tasks.destroy', $task->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
				</td>
			</tr>

			@endforeach
		</tbody>
	</table>


</div>

@endsection
