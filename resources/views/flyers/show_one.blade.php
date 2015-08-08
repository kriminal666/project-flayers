@inject('countries', 'App\Http\Utils\Country')

@extends('layout')

@section('content')

<div class="row">
    <div class="col-md-3">
        <h1>{{array_search($flyer->country, $countries::all())}}</h1>
        <h2>{{$flyer->state}}</h2>
        <h2>{{ $flyer->street }}</h2>
        <h2>$ {!! $flyer->price !!}</h2>
        <hr>
        <div class="description">{!! nl2br($flyer->description) !!}</div>
    </div>
    <div class="col-md-9">
        @foreach($flyer->photos as $photo)
            <img src="{{$photo->path}}"/>
        @endforeach
    </div>
</div>
    <hr>
<h2>Add your photos</h2>
    {!!Form::open(array('route' =>array('store_photo_path', $flyer->zip, $flyer->street), 'files' => true, 'class' => 'dropzone', 'id' => 'addPhotosForm'))!!}
    {!!Form::close()!!}

    <hr>

@stop

@section('footer.scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>
    <script>
        Dropzone.options.addPhotosForm = {

            paramName: "photo", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            acceptedFiles: ' .jpg, .jpeg, .png, .bmp,'

        }
    </script>

@stop
