@extends('layouts.app')

@section('content')
<div class="container">
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
                        @if($new->gallery)
                            <div class="card" style="width:100%;height:200px;">
                                <img class="card-img-top" style="width:100%;height:100%;"  src="news/{{explode('|',$new->gallery)[0]}}" alt="News image">
                            </div>
                        @else
                            <div class="card" style="width:100%;height:200px;">
                                <img class="card-img-top" style="width:100%;height:100%;"  src="icon.png" alt="Poste logo">
                            </div> 
                        @endif
                    </div>
                @else
                    <div class="col-lg-4" style="padding:0;">
                        @if($new->gallery)
                            <div class="card" style="width:100%;height:200px;">
                                <img class="card-img-top" style="width:100%;height:100%;"  src="news/{{explode('|',$new->gallery)[0]}}" alt="News image">
                            </div>
                        @else
                            <div class="card" style="width:100%;height:200px;">
                                <img class="card-img-top" style="width:100%;height:100%;"  src="icon.png" alt="Poste logo">
                            </div> 
                        @endif
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
        @endforeach
    @else
        <h1 style="text-align:center;">Nothing to show</h1>
    @endif
</div>

@endsection