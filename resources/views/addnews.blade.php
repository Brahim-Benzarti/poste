@extends('layouts.app')

@section('content')
@if (count($errors) > 0)
   <div class = "d-flex alert alert-danger justify-content-center">
       <h3>Please make sure to fill all the required fields,</h3><br><h3>while respecting the required format.</h3>
   </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md 8">
            <div class="card">
                <div class="card-header">
                    Publish something new.
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('addnews') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- title -->
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}<span class="text-danger h5" title="required field">  *</span></label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Summary -->
                        <div class="form-group row">
                            <label for="summary" class="col-md-4 col-form-label text-md-right">{{ __('Summary') }}<span class="text-danger h5" title="required field">  *</span></label>

                            <div class="col-md-6">
                                <input id="summary" type="text" class="form-control @error('summary') is-invalid @enderror" name="summary" value="{{ old('summary') }}" required autocomplete="summary" autofocus>

                                @error('summary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- main content -->
                        <div class="form-group row">
                            <label for="main" class="col-md-4 col-form-label text-md-right">{{ __('Main contnet') }}<span class="text-danger h5" title="required field">  *</span></label>

                            <div class="col-md-6">
                                <input id="main" type="text" class="form-control @error('main') is-invalid @enderror" name="main" value="{{ old('main') }}" required autocomplete="main" autofocus>

                                @error('main')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- secondary content -->
                        <div class="form-group row">
                            <label for="secondary" class="col-md-4 col-form-label text-md-right">{{ __('Secondary content') }} </label>

                            <div class="col-md-6">
                                <input id="secondary" type="text" class="form-control @error('secondary') is-invalid @enderror" name="secondary" value="{{ old('secondary') }}" autocomplete="secondary" autofocus>

                                @error('secondary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- list -->
                        <div class="form-group row">
                            <label id="lilabel" for="list" class="col-md-4 col-form-label text-md-right">{{ __('List') }}</label>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <select id="ln" class="form-control @error('ln') is-invalid @enderror" name="ln" required autocomplete="ln" autofocus>
                                            <option value="0" @if(old('ln')=="0") selected @endif>None</option>
                                            <option value="1" @if(old('ln')=="1") selected @endif>1</option>
                                            <option value="2" @if(old('ln')=="2") selected @endif>2</option>
                                            <option value="3" @if(old('ln')=="3") selected @endif>3</option>
                                            <option value="4" @if(old('ln')=="4") selected @endif>4</option>
                                            <option value="5" @if(old('ln')=="5") selected @endif>5</option>
                                            <option value="6" @if(old('ln')=="6") selected @endif>6</option>
                                            <option value="7" @if(old('ln')=="7") selected @endif>7</option>
                                            <option value="8" @if(old('ln')=="8") selected @endif>8</option>
                                            <option value="9" @if(old('ln')=="9") selected @endif>9</option>
                                        </select>

                                        @error('ln')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div  id="li" class="col-lg-9">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- image -->
                        <div class="form-group row">
                            <label for="gallery" class="col-md-4 col-form-label text-md-right">{{ __('Gallery') }}</label>

                            <div class="col-md-6">
                                <label id="gallerylabel" for="gallery" class="btn btn-primary form-control @error('gallery') is-invalid @enderror"><span id="filemessage">Choose Image(s)</span>
                                    <input style="display:none;" multiple id="gallery" type="file" name="gallery[]"  value="{{ old('gallery') }}" autocomplete="gallery" accept="image/*" autofocus>
                                </label>
                                @error('gallery')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <!-- submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit news') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/news.js')}}"></script>
@endsection