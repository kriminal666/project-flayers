@extends('layout')


@section('content')



    <div data-example-id="hoverable-table" class="bs-example">
        <table class="table table-hover">
            <thead>
            <tr>

                <th>Country</th>
                <th>State</th>
                <th>Street</th>
                <th>Zip/Postal Code</th>
                <th>Price</th>
                <th>Description</th>
                <th>Images</th>
                <th>Actions</th>

            </tr>
            </thead>
            <tbody>

            @foreach($flyers as $flyer)
            <tr>

                <td>{{$flyer->country}}</td>
                <td>{{$flyer->state}}</td>
                <td>{{$flyer->street}}</td>
                <td>{{$flyer->zip}}</td>
                <td>{{$flyer->price}}</td>
                <td><textarea>{{$flyer->description}}</textarea></td>
                <td>
                    <div class="row">
                        @foreach($flyer->photos as $photo)
                        <img src="{{URL::to('/')}}/images/home_pics/{{$photo->path}}" height="70" width="70"/>
                        @endforeach



                    </div>

                </td>
                <td>
                    <div class="text-right pull-right" style="width: 90px;">
                    <a href="{{route('flyers.edit',[$flyer->id])}}" class="btn btn-primary">Edit</a>
                    <form action="{{route('flyers.destroy',[$flyer->id])}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-primary " >Delete</button>
                    </form>
                        </div>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@stop