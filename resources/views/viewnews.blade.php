@extends('layouts.app')

@section('content')

<div class="container">
    @if($news!=null)
    <div id="title" class="display-3">{{$news['title']}}</div>
    <div id="main">{{$news['main']}}</div>
    @if(strlen($news->list)>0)
    <div id="list">
        <ul>
        @foreach(array_slice(explode('|',$news->list),0,count(explode('|',$news->list))-1) as $li)
            <li><span class="font-weight-bold">{{explode(':',$li)[0]}} : </span>{{explode(':',$li)[1]}}</li>
        @endforeach
        </ul>    
    </div>
    @endif
    <div id="second">{{$news['secondary']}}</div>
    @if(strlen($news->gallery)>0)
    <div id="gallery" class="row justify-content-around" style="min-height:300px;padding:20px;">
        @foreach(array_slice(explode('|',$news->gallery),0,count(explode('|',$news->gallery))-1) as $image)
        <div class="col-md-4" style="width:100%; height:300px;">
            <img src="{{asset('news/'.$image)}}" style="width:100%;height:100%">
        </div>
        @endforeach
    </div>
    @endif
    <a href="{{route('news')}}" style="float:right;"><- Go back</a>
    @else
    <h3 class="text-danger">Nothing to show</h3>
    @endif
</div>

@endsection