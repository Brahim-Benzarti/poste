@extends("layouts.app")

@section('content')
<div class="container" style="margin-bottom:40vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Success</div>
                <div class="card-body">
                    <p>{{$success_message}}</p><br>
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-primary" href="{{route('index')}}">Go back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection