@inject('countries', 'App\Http\Utils\Country')

<div class="col-md-6">

        <div class="form-group">
            <label for="street">Street:</label>
            {!!Form::text('street',old('street'),array('class' => 'form-control'))!!}
        </div>

        <div class="form-group">
            <label for="city">City:</label>
            {!!Form::text('city',old('city'),array('class' => 'form-control'))!!}
        </div>

        <div class="form-group">
            <label for="zip">Zip/Postal Code:</label>
            {!!Form::text('zip',old('zip'),array('class' => 'form-control'))!!}
        </div>

        <div class="form-group">
            <label for="country">Country:</label>
            <select name="country" id="country" class="form-control">
                @foreach($countries::all() as $name => $code)
                    @if(isset($flyer) && $flyer->country ==$code)
                        <option value="{{$code}}" selected>{{$name}}</option>
                    @else
                        <option value="{{$code}}">{{$name}}</option>
                    @endif

                @endforeach

            </select>

        </div>

        <div class="form-group">
            <label for="state">State:</label>
            {!!Form::text('state',old('state'),array('class' => 'form-control'))!!}
        </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="price">Sale price:</label>
        {!!Form::text('price',old('price'),array('class' => 'form-control'))!!}
    </div>

    <div class="form-group">
        <label for="description">Home description:</label>
        {!!Form::textArea('description',old('description'),array('class' => 'form-control','rows' =>10))!!}
    </div>
</div>
    <div class="col-md-12">
        <hr>
        <div class="form-group">
            @if(isset($flyer))
                {!!Form::hidden('id',$flyer->id)!!}
                <button type="submit"  class="btn btn-primary">Update Flyer</button>

            @else

                <button type="submit"  class="btn btn-primary">Create Flyer</button>

            @endif

        </div>
    </div>










