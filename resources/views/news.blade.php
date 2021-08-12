@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md 8">
            <div class="card">
                <div class="card-header">
                    Publish something new.
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('news') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- title -->
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

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
                            <label for="summary" class="col-md-4 col-form-label text-md-right">{{ __('Summary') }}</label>

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
                            <label for="main" class="col-md-4 col-form-label text-md-right">{{ __('Main contnet') }}</label>

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
                            <label for="secondary" class="col-md-4 col-form-label text-md-right">{{ __('Secondary content') }}</label>

                            <div class="col-md-6">
                                <input id="secondary" type="text" class="form-control @error('secondary') is-invalid @enderror" name="secondary" value="{{ old('secondary') }}" required autocomplete="secondary" autofocus>

                                @error('secondary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- list -->
                        <div class="form-group row">
                            <label for="list" class="col-md-4 col-form-label text-md-right">{{ __('List') }}</label>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <input id="ln" type="text" class="form-control @error('ln') is-invalid @enderror" name="ln" value="{{ old('Number') }}" required autocomplete="ln" autofocus>

                                        @error('ln')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-8">
                                        <!-- this needs to be generated n times as required -->
                                        <input id="li_" type="text" class="form-control @error('li_') is-invalid @enderror" name="li_" value="{{ old('li_') }}" required autocomplete="li_" autofocus>

                                        @error('li_')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- image -->
                        <div class="form-group row">
                            <label for="gallery" class="col-md-4 col-form-label text-md-right">{{ __('Gallery') }}</label>

                            <div class="col-md-6">
                                <input multiple id="gallery" type="file" class="form-control @error('gallery') is-invalid @enderror" name="gallery" value="{{ old('gallery') }}" required autocomplete="gallery" autofocus>

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

@endsection