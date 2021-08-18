<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;
use App\Models\user;
use App\Models\news as newsmodel;

class news extends Controller
{
    public function showone($title=null){

        $table= newsmodel::find($title);
        if($table){
            return view('viewnews', ["news"=>$table,"edit"=>0]);
        }else{
            return redirect()->route('news');
        }
    }


    public function adminform(){
        return view('addnews',["edit"=>0]);
    }


    public function adminformtoedit(Request $request, $id){
        if($request->method()=="GET"){
            $table= newsmodel::find($id);
            if($table){
                return view('viewnews', ["news"=>$table,"edit"=>1]);
            }else{
                return redirect()->route('news');
            }
        }else if($request->method()=="POST"){
            if($request->v==1){
                $this->validate($request, [
                    'ln'=>["sometimes",'numeric','between:0,9'],
                    'liitems.*'=>["sometimes","required","string","between:0,100"],
                    'gallery.*'=>["sometimes",'required','image'],
                    'title'=>["sometimes",'required','max:100','string'],
                    'summary'=>["sometimes",'required','max:300','string'],
                    'main'=>["sometimes",'required','string'],
                    'secondary'=>["sometimes",'string','nullable']
                ]);
    
                $table= newsmodel::find($id);
    
                $updatable=["main","title","summary","list","secondary"];
                foreach($updatable as $to){
                    if($request->field==$to){
                        $table[$to]=$request->content;
                        $table->updated_by=$request->user;
                        $table->edited_at=date('Y-m-d H:i:s', time());
                        $table->save();
                    }
                }
                return "200";
            }else if($request->v ==2){
                $this->validate($request, [
                    "gall"=>["required","image","mimes:jpeg,png,jpg,gif","max:10240"]
                ]);
                $table= newsmodel::find($request->news);
                unlink(public_path('news/'.$request->index));
                $newimage=time().$request->gall->hashname();
                $request->gall->move(public_path("news"),$newimage);
                $table->gallery=str_ireplace($request->index,$newimage,$table->gallery);
                $table->save();
                return $newimage;
            }
        }
    }

    public function show(){
        $table= newsmodel::all()->sortDesc();
        $creators=[];
        if(!empty($table[0])){
            $users=user::all();
            foreach($table as $new){
                if(!key_exists($new->id,$creators)){
                    $creators[$new->id]=$users->firstWhere('id',$new->user_id);
                }
            }
            return view('news', ["news"=>$table, "creators"=>$creators]);
        }else{
            return view('news', ["news"=>[]]);
        }
    }
    public function showinput(Request $request){
        // $this->validate($request,[
        //     'names'=>["required"]
        // ]);
        // hhhhhhhhhhhhhhhhhh this one is funny keep an eye on the syntax... I wrote a period not an arrow..
        // next time fix this and make a proper validator 
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
        
        $i=0;
        if($request->gallery){
            foreach($request->gallery as $image){
                $name=time().$image->hashname();
                $image->move(public_path('news'),$name);
                $table->gallery.=$name.'|';
            }
            $table->gallery=substr($table->gallery,0,strlen($table->gallery)-1);
        }


        if($request->secondary !== null){
            $table->secondary=ucfirst(trim($request->secondary));
        }

        if($request->ln){
            foreach($request->liitems as $item){
                $table->list.=ucfirst(trim($item)).'|';
            }
            $table->list=substr($table->list,0,strlen($table->list)-1);
        }
        
        $table->title=ucfirst(trim($request->title));
        $table->summary=ucfirst(trim($request->summary));
        $table->main=ucfirst(trim($request->main));
        $table->date=date('Y-m-d H:i:s', time());
        $table->user_id=Auth::user()->id;
        $table->save();
        
        
        return redirect()->route('news');
    }
}
