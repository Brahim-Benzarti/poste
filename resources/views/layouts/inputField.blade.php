@foreach($names as $name)
<div class="form-group row">
    <div id="{{$name}}" class="col-lg-12">
        <input type="text" class="form-control @error('{{$name}}') is-invalid @enderror" name="liitems[]" value="{{ old('name') }}"  autocomplete="{{$name}}" autofocus>

        @error('{{$name}}')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
@endforeach