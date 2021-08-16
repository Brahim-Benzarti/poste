@extends('layouts.app')

@section('content')
<div class="container">
    @if(count($news) > 0)
        @foreach($news as $index=>$new)
            <div class="row mt-3 justify-content-between" style="min-height:150px;">
                @if($index % 2 == 0)
                    <div class="col-md-8" style="background-color:#F0F0F0;">
                        <h2 class="mt-2" >{{$new->title}}</h3>
                        <p>{{$new->summary}}</p>
                        <a style="position:absolute;bottom:10px;right:20px;" href="{{route('detailedNews')}}/{{$new->id}}">Read More -></a>
                    </div>
                    <div class="col-md-4" style="padding:0">
                        @if($new->gallery)
                            <div class="card" style="width:100%;height:150px;">
                                <img class="card-img-top" style="width:100%;height:100%;"  src="news/{{explode('|',$new->gallery)[0]}}" alt="News image">
                            </div>
                        @else
                            <div class="card" style="width:100%;height:150px;">
                                <img class="card-img-top" style="width:100%;height:100%;"  src="icon.png" alt="Poste logo">
                            </div> 
                        @endif
                    </div>
                @else
                    <div class="col-md-4" style="padding:0">
                        @if($new->gallery)
                            <div class="card" style="width:100%;height:150px;">
                                <img class="card-img-top" style="width:100%;height:100%;"  src="news/{{explode('|',$new->gallery)[0]}}" alt="News image">
                            </div> 
                        @else
                            <div class="card" style="width:100%;height:150px;">
                                <img class="card-img-top" style="width:100%;height:100%;"  src="icon.png" alt="Poste logo">
                            </div> 
                        @endif
                    </div>
                    <div class="col-md-8" style="background-color:#F0F0F0;">
                        <h2 class="mt-2" >{{$new->title}}</h3>
                        <p>{{$new->summary}}</p>
                        <a style="position:absolute;bottom:10px;right:20px;" href="{{route('detailedNews')}}/{{$new->id}}">Read More -></a>
                    </div>
                @endif
            </div>
        @endforeach
    @else
        <h1>Nothing to show</h1>
    @endif
</div>

@endsection