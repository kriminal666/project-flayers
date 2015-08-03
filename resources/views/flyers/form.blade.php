@inject('countries', 'App\Http\Utils\Country')



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

<hr>
<div class="form-group">
    <label for="price">Sale price:</label>
    {!!Form::text('price',old('price'),array('class' => 'form-control'))!!}
</div>

<div class="form-group">
    <label for="description">Home description:</label>
    {!!Form::textArea('description',old('description'),array('class' => 'form-control','rows' =>10))!!}
</div>

<div class="form-group">
    <label for="photos">Photos:</label>
    <input multiple="true" type="file" name="photos[]" id="photos" class="form-control input-file" value="{{ old('photos') }}">
</div>



<div class="form-group">
    <button type="submit"  class="btn btn-primary">Create Flyer</button>
</div>


