@extends('layouts.app') 
@extends('layouts.auth') 
@extends('layouts.alert_message') 

@section('content')

<div class="container">

	<h2>levels List</h2>
	<a href="{{ route('levels.create')}}" class="btn btn-primary">Add new level</a>
	<table class="table">
		<thead>
			<tr>
				<td >levels</td>
				<td colspan = 2>Actions</td>
			</tr>
		</thead>
		<tbody>
			@foreach($levels as $level)
			<tr>
				<td>{{$level->description}}</td>
				<td>
					 <a href="{{ route('levels.edit',$level->id)}}" class="btn btn-primary">Edit</a>
				</td>	
				<td>
                    <form action="{{ route('levels.destroy', $level->id)}}" method="post">
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
