@inject('countries', 'App\Http\Utils\Country')

@extends('layout')

@section('content')

<div class="row">
    <div class="col-md-4">
        <h1>{{array_search($flyer->country, $countries::all())}}</h1>
        <h2>{{$flyer->state}}</h2>
        <h2>{{ $flyer->street }}</h2>
        <h2>$ {!! $flyer->price !!}</h2>
        <hr>
        <div class="description">{!! nl2br($flyer->description) !!}</div>
    </div>

    <div class="col-md-8 gallery">
        @foreach($flyer->photos->chunk(4) as $set)
            <div class="row">
                <div id="links">
                    @foreach($set as $photo)
                        <div class="col-md-3 gallery__image">
                            <a href="/{{$photo->path}}" title="{{$photo->name}}" data-gallery>
                                <img src="/{{$photo->thumbnail_path}}" alt="image">
                            </a>

                        </div>
                    @endforeach
                </div>
            </div>

        @endforeach
    </div>
</div>
<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left prev">
                        < Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next >

                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

    <hr>
@if($currentUser->id == $flyer->user_id)
    <h2>Add your photos</h2>
        {!!Form::open(array('route' =>array('store_photo_path', $flyer->zip, $flyer->street), 'files' => true, 'class' => 'dropzone', 'id' => 'addPhotosForm'))!!}
        {!!Form::close()!!}

        <hr>
@endif
@stop

@section('footer.scripts')
    <script src="/js/dropzone.js"></script>
    <script>
        Dropzone.options.addPhotosForm = {

            paramName: "photo", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            acceptedFiles: ' .jpg, .jpeg, .png, .bmp,'

        }
    </script>

    <script src="/blueimp/js/jquery.blueimp-gallery.min.js"></script>
    <script src="/blueimp/js/bootstrap-image-gallery.min.js"></script>

@stop
