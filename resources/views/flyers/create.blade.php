
@extends('layout')

@section('content')

    <h1>Sell your home</h1>
    <hr>

    <div class="row">
        <div class="col-md-6">


            @if(isset($flyer))
                {!! Form::model($flyer, array('action' =>'FlayersController@update','method' => 'put','files' => true)) !!}
            @else
                {!!Form::open(array('url' => 'flyers', 'files' => true))!!}
            @endif

        @include('flyers.form')

        @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {!! Form::close() !!}
    </div>
    </div>


@stop
