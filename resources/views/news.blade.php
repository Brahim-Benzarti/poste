@extends('layouts.app')

@section('content')
<div id="feed" class="container">
    @if(count($news) > 0)
        @foreach($news as $index=>$new)
            <div class="row mt-3 justify-content-between" style="min-height:200px;">
                @if($index % 2 == 0)
                    <div class="d-flex flex-column justify-content-between col-lg-8" style="background-color:#F0F0F0;">
                        <div class="row" style="padding:10px;">
                            <div class="col">
                                <h2 class="mt-2" >{{$new->title}}</h3>
                                <p>{{$new->summary}}</p>
                            </div>
                        </div>
                        <div class="row justify-content-between" style="padding:10px;padding-top:0px;">
                            <p class="text-info" style="margin:0;padding:0;">{{$new->date}}</p>
                            <a class="link-primary" href="{{route('detailedNews')}}/{{$new->id}}">Read More -></a>
                        </div>
                    </div>
                    <div class="col-lg-4" style="padding:0;">
                        <div class="card" style="width:100%;height:200px;">
                            @if($new->gallery)
                                <img class="card-img-top" style="width:100%;height:100%;"  src="news/{{explode('|',$new->gallery)[0]}}" alt="News image">
                            @else
                                <img class="card-img-top" style="width:100%;height:100%;"  src="icon.png" alt="Poste logo">
                            @endif
                            @auth <div class="card-img-overlay d-flex align-items-end justify-content-center"><button class="btn btn-primary" onclick="show({{$new->id}}+'panel');"> Info</button></div> @endauth
                        </div> 
                    </div>
                @else
                    <div class="col-lg-4" style="padding:0;">
                        <div class="card" style="width:100%;height:200px;">
                            @if($new->gallery)
                                <img class="card-img-top" style="width:100%;height:100%;"  src="news/{{explode('|',$new->gallery)[0]}}" alt="News image">
                            @else
                                <img class="card-img-top" style="width:100%;height:100%;"  src="icon.png" alt="Poste logo">
                            @endif
                            @auth <div class="card-img-overlay d-flex align-items-end justify-content-center"><button class="btn btn-primary" onload="this.click()" onclick="show({{$new->id}}+'panel');"> Info</button></div> @endauth
                        </div> 
                    </div>
                    <div class="d-flex flex-column justify-content-between col-lg-8" style="background-color:#F0F0F0;">
                        <div class="row" style="padding:10px;">
                            <div class="col">
                                <h2 class="mt-2" >{{$new->title}}</h3>
                                <p>{{$new->summary}}</p>
                            </div>
                        </div>
                        <div class="row justify-content-between" style="padding:10px;padding-top:0px;">
                            <p class="text-info" style="margin:0;padding:0;">{{$new->date}}</p>
                            <a class="link-primary" href="{{route('detailedNews')}}/{{$new->id}}">Read More -></a>
                        </div>
                    </div>
                @endif
            </div>
            @auth
            <div id="{{$new->id}}panel" class="row bg-dark align-items-center justify-content-between" style="padding:10px;display:none;">
                <div class="col-md-6">
                    <h3 style="margin:0px;text-align:center;" class="text-white">Created by: {{$creators[$new->id]->name}}</h3>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-around">
                    <a class="btn btn-warning" href="{{route('AdminFormForEditNews')}}/{{$new->id}}">Edit</a>
                    @if($new->user_id == Auth::user()->id)
                    <a href="" class="btn btn-primary">Notes</a>
                    <a href="" class="btn btn-danger">Delete</a>
                    @else
                    <a class="btn btn-info" href="">Leave a note.</a>
                    @endif
                </div>
            </div>
            <script src="{{asset('js/jquery.min.js')}}"></script>
            <script src="{{asset('js/news.js')}}"></script>
            @endauth
        @endforeach
    @else
        <h1 style="text-align:center;">Nothing to show</h1>
    @endif
</div>
@endsection