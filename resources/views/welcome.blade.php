@extends('layouts.app')

@section('content')

    @if (Auth::check())
    
    <div class="container">
    
    	<div>
    		<a style="margin: 19px;" href="{{ route('tasks.index')}}"
    			class="btn btn-link">Taks</a>
    	</div>
    	<div>
    		<a style="margin: 19px;" href="{{ route('levels.index')}}"
    			class="btn btn-link">Levels</a>
    	</div>
    
    </div>
    
    @else
    
    <h3>
    	You need to log in. <a href="/login">Click here to login</a>
    
    </h3>
    
    @endif
@endsection
