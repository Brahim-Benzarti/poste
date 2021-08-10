@foreach($deliveryOffice as $state=>$offices)
<div class="form-group row" id="{{$state}}">
<label for="pornumber" class="col-sm-4 col-form-label text-sm-right">{{ __('Number') }}</label>

<div class="col-sm-8">
    
    <select id="do" class="form-control @error('do') is-invalid @enderror" name="do" value="{{ old('do') }}" required autocomplete="do" autofocus>
        <option value="0" selected>Select an Office</option>
        @foreach($offices as $office)
        <option value="{{$office}}">{{$office}}</option>
        @endforeach
    </select>

    @error('pornumber')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>
@endforeach
