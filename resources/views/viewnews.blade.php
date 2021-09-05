@extends('layouts.app')

@section('content')

<div id="container" class="container">
    @if($news!=null)
    @if($edit) <meta id="id" content="{{$news['id']}}"> <meta id="user_id" content="{{Auth::user()->id}}">@endif

    <div class="row mb-3">
        <div class="col">
        @if($edit)
        <label id="title"  class="display-4" for="titleedit">{{$news['title']}}</label>
        <div class="row">
            <div class="col" style="padding:0px;">
                <input id="titleedit" name="title" value="{{$news['title']}}" class="form-control" required>
                <meta id="oldtitle" content="{{$news['title']}}">
            </div>
        </div>
        <div id="titlesuccess" class="row bg-success" style="display:none">
            <div class="col d-flex justify-content-center align-items-center">
                <h3 class="text-light" style="margin:0px;padding:10px;">Updated Successfully</h3>
            </div>
        </div>
        <div id="titleproblem" class="row bg-danger" style="display:none">
            <div class="col d-flex justify-content-center align-items-center">
                <h3 class="text-light" style="margin:0px;padding:10px;">There's an Issue :(</h3>
            </div>
        </div>
        @else
        <p id="title" class="display-4">
            {{$news['title']}}
        </p>
        @endif
        </div>
    </div>


    <div class="row" id="main">
        <div class="col">
        @if($edit)
        <div class="row">
            <div class="col" style="padding:0px;">
                <textarea class="form-control" id="mainedit" name="main" style="width:100%;" rows="6">{{$news['main']}}</textarea>
                <meta id="oldmain" content="{{$news['main']}}">
            </div>
        </div>
        <div id="mainsuccess" class="row bg-success" style="display:none">
            <div class="col d-flex justify-content-center align-items-center">
                <h3 class="text-light" style="margin:0px;padding:10px;">Updated Successfully</h3>
            </div>
        </div>
        <div id="mainproblem" class="row bg-danger" style="display:none">
            <div class="col d-flex justify-content-center align-items-center">
                <h3 class="text-light" style="margin:0px;padding:10px;">There's an Issue :(</h3>
            </div>
        </div>
        @else
        @if(count(explode('WWW',strtoupper($news['main'])))>1)
            @foreach(explode(' ',$news['main']) as $part)
                @if(strpos(strtoupper($part),'WWW')===0)
                    <a target="_blank" href="http://{{$part}}">{{$part}}</a>
                @else
                    {{$part}}
                @endif
            @endforeach
        @else
            {{$news['main']}}
        @endif
        @endif
        </div>
    </div>


    
    
    <div class="row mt-3">
        <div class="col">
            @if($edit)
                <div class="row">
                    <label id="list" for="listedit">
                    @if(strlen($news->list)>0)
                        {{$news['list']}}
                    @endif
                    </label>
                </div>
                <div class="row">
                    <div class="col" style="padding:0px;">
                        <label for="listedit"> <span class="text-danger" style="font-size: 20px;">*</span> type '|' to add another list item</label>
                        <input class="form-control" id="listedit" name="list" value="{{$news['list']}}" required>
                        <!-- style="position:absolute;width:0px;height:0px;border:0px;" -->
                        <meta id="oldlist" content="{{$news['list']}}">
                    </div>
                </div>
                <div id="listsuccess" class="row bg-success" style="display:none">
                    <div class="col d-flex justify-content-center align-items-center">
                        <h3 class="text-light" style="margin:0px;padding:10px;">Updated Successfully</h3>
                    </div>
                </div>
                <div id="listproblem" class="row bg-danger" style="display:none">
                    <div class="col d-flex justify-content-center align-items-center">
                        <h3 class="text-light" style="margin:0px;padding:10px;">There's an Issue :(</h3>
                    </div>
                </div>
            @else
                @if(strlen($news->list)>0)
                    <ul>
                        @foreach(explode('|',$news->list) as $li)
                            @if(count(explode(':',$li))>1)
                                <li><span class="font-weight-bold">{{explode(':',$li)[0]}} : </span>{{explode(':',$li)[1]}}</li>
                            @else
                                <li>{{explode(':',$li)[0]}}</li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            @endif
        </div>
    </div>
    



    @if(strlen($news->gallery)>0)
    <div class="row mt-3">
        <div class="col">
            <div id="gallery" class="row justify-content-around" style="min-height:300px;">
                @foreach(explode('|',$news->gallery) as $i=>$image)
                <div class="card mt-1 col-lg-@if(count(explode('|',$news->gallery)) % 2 == 0){{6}}@elseif(count(explode('|',$news->gallery))==1){{8}}@else{{4}}@endif" style="padding:0;width:100%; height:@if(count(explode('|',$news->gallery)) % 2 == 0){{350}}@elseif(count(explode('|',$news->gallery))==1){{400}}@else{{300}}@endif px;">
                    <img class="card-img-top" src="{{asset('news/'.$image)}}" style="width:100%;height:100%;">
                    @auth @if($edit)
                    <div class="card-img-overlay d-flex justify-content-around align-items-end">
                        <!-- this needs to be fixed the server gets the same image name for every req.. thus starting from the second update an error will be thrown -->
                        <!-- a patch is needed here  -->
                        <div style="position:absolute;"></div>
                        <button class="btn btn-success" onclick="updateimage(this,0);" value="{{$image}}">Change</button> 
                        <button class="btn btn-danger" onclick="updateimage(this,1);" value="{{$image}}">Remove</button>
                    </div>
                    @endif @endauth
                </div>
                @endforeach
            </div>
        </div>
        @auth @if($edit)
        <form style="display:none" method="post" id="pictureForm" enctype="multipart/form-data">
            @csrf
            <input id="picadd" type="file" name="gall" >
        </form>
        @endif @endauth
    </div>
    @endif




    <div class="row mt-3" id="secondary">
        <div class="col">
        @if($edit)
        <div class="row">
            <div class="col" style="padding:0px;">
                <textarea class="form-control" id="secondaryedit" name="secondary" style="width:100%;" rows="6">{{$news['secondary']}}</textarea>
                <meta id="oldsecondary" content="{{$news['secondary']}}">
            </div>
        </div>
        <div id="secondarysuccess" class="row bg-success" style="display:none">
            <div class="col d-flex justify-content-center align-items-center">
                <h3 class="text-light" style="margin:0px;padding:10px;">Updated Successfully</h3>
            </div>
        </div>
        <div id="secondaryproblem" class="row bg-danger" style="display:none">
            <div class="col d-flex justify-content-center align-items-center">
                <h3 class="text-light" style="margin:0px;padding:10px;">There's an Issue :(</h3>
            </div>
        </div>
        @else
        @if(count(explode('WWW',strtoupper($news['secondary'])))>1)
            @foreach(explode(' ',$news['secondary']) as $part)
                @if(strpos(strtoupper($part),'WWW')===0)
                    <a target="_blank" href="http://{{$part}}">{{$part}}</a>
                @else
                    {{$part}}
                @endif
            @endforeach
        @else
            {{$news['secondary']}}
        @endif
        @endif
        </div>
    </div>





    <a href="{{route('news')}}" style="float:right;"><- Go back</a>
    @else
    <h3 class="text-danger">Nothing to show</h3>
    @endif

    @if($edit)
    <div class="row mt-4">
        <div class="col d-flex justify-content-center">
            <a href="{{route('detailedNews')}}/{{$news->id}}" class="btn btn-primary">View as a guest.</a>
        </div>
    </div>
    @endif

    <div id="debbuging"></div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/newsedit.js')}}"></script>
@endsection