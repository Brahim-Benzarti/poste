<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;
use App\Models\news as newsmodel;

class news extends Controller
{
    public function showone($title=null){
        
        $table= newsmodel::all()->firstWhere('id',$title);
        if($table){
            return view('viewnews', ["news"=>$table]);
        }else{
            return redirect()->route('news');
        }
    }
    public function adminform(){
        return view('addnews');
    }
    public function show(){
        $table= newsmodel::all()->sortDesc();
        if(!empty($table[0])){
            return view('news', ["news"=>$table]);
        }else{
            return view('news', ["news"=>[]]);
        }
    }
    public function showinput(Request $request){
        // $this.validate($request,[
        //     'names'=>["required"]
        // ]);
        return view("layouts/inputField", ["names"=>$request->names]);

    }
    public function addnews(Request $request){
        $this->validate($request, [
            'ln'=>['numeric','between:0,9'],
            'liitems.*'=>["sometimes","required","string","between:0,100"],
            'gallery.*'=>['sometimes','required','image'],
            'title'=>['required','max:100','string'],
            'summary'=>['required','max:300','string'],
            'main'=>['required','string'],
            'secondary'=>['sometimes','string','nullable']
        ]);

        $table= new newsmodel;
        
        // $gallery=[];
        $i=0;
        if($request->gallery){
            foreach($request->gallery as $image){
                $name=time().$image->hashname();
                // $gallery[$i]=$name;
                $image->move(public_path('news'),$name);
                $table->gallery.=$name.'|';
            }
        }


        if($request->secondary !== null){
            $table->secondary=$request->secondary;
        }

        if($request->ln){
            foreach($request->liitems as $item){
                $table->list.=$item.'|';
            }
        }
        
        $table->title=$request->title;
        $table->summary=$request->summary;
        $table->main=$request->main;
        $table->date=date('Y-m-d H:i:s', time());
        $table->user_id=Auth::user()->id;

        $table->save();

        return redirect()->route('news');
    }
}
