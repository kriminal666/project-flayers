@extends('layout')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>Project Flyer</h1>
        <h1>Theme example</h1>
        <p>
            This is a template showcasing the optional theme stylesheet included in Bootstrap.
            Use it as a starting point to create something more unique by building on or modifying it.
        </p>
        @if($currentUser)
            <a href="{{route('flyers.create')}}"  class="btn btn-primary">Create a Flayer</a>
            <a href="{{route('flyers.index')}}"  class="btn btn-primary">Show all Flayers</a>
        @else
            <a href="{{url('auth/login')}}"  class="btn btn-primary">Login</a>
            <a href="{{url('auth/register')}}"  class="btn btn-primary">Register</a>
        @endif

    </div>





@stop