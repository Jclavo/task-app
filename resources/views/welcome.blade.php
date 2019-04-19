@extends('layouts.app') 
@section('content') 

@if (Auth::check())

<div class="container">


	<a class="navbar-brand" href="{{ route('tasks.index')}}">
        Task
    </a>
    <a class="navbar-brand" href="{{ route('levels.index')}}">
        Levels
    </a>

    
</div>

@else

<h3>
	You need to log in. <a href="{{ route('login') }}">Click here to login</a>

</h3>

<p>Created by jclavotafur@gmail.com</p>

@endif 
@endsection
