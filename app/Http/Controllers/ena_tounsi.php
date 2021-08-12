<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ena_tounsi_form;
use Illuminate\Validation\Rule;

class ena_tounsi extends Controller
{
    // stating the different states and their offices
    // this was done for easy updating, and can be treated as a data base also
    function __construct(){
        $this->deliveryOffice=[
            "Ariana"=>["Ariana","Borj El Baccouch","Charguia II","Cité Ennasr","Cité Tadhaman","Menzah 6"],
            "Beja"=>["Beja","Mjez El Bab","Nefza","Tboursok"],
            "Ben_Arous"=>["Ben Arous","Ezzahra","Hammem Life","Mohamadia","Rades","Rades Medina"],
            "Bizerte"=>["Bizerte","Bizerte bab Mateur","Mateur","Menzel Bourguiba","Menzel Jemil","Ras Jbal"],
            "Gabes"=>["El Hamma","Gabes","Gabes Hached","Mareth","Metouia"],
            "Gafsa"=>["El Guettar","Gafsa","Gafsa Intilaka","Métlaoui","Redeyef"],
            "Jendouba"=>["Ain Draham","Bou Salem","Ghardimaou","Jendouba","Tabarka"],
            "Kairouan"=>["Bouhajla","Kairouan","Kairouan Okba"],
            "Kasserine"=>["Feriana","Kasserine","Sbeitla","Sbiba","Tela"],
            "Kebilli"=>["Douz","Kebilli","Kebilli Beyez","Souk Lahad"],
            "Kef"=>["Dahmani","Kef Ouest","Le Kef","Tejerouine"],
            "Mahdia"=>["Chebba","El Jem","Ksour Essef","Mahdia","Mahdia Hiboun","Mahdia République","Souassi"],
            "Manouba"=>["Denden","El Mornaguia","Manouba","Tébourba"],
            "Medenine"=>["Benguerdane","Cedouikeche","Jerba","Jerba Airport","Medenine","Medenine Perseverance","Midoun","Souihel","Zarzis"],
            "Monastir"=>["Jammel","Ksar Hlel","Moknine","Monastir","Monastir Airport","Monastir Republic"],
            "Nabeul"=>["Bni Khiar","Grombalia","Hammamet","Kelibia","Korba","Menzel Tmim","Nabeul","Nabeul Thameur","Slimen","Yassmine Hammamet"],
            "Sfax"=>["Cité El Habib","El Bousten","Jbeniana","Kerkinah","Mahres","Sakiet Ezzit","Sfax","Sfax El Jadida","Sfax Hached","Sidi Abbes"],
            "Sidi_Bouzid"=>["Ben Aoun","Bir El Heffey","Jilma","Maknassy","Rgueb","Sidi Bouzid"],
            "Siliana"=>["Siliana","Rouhia","Makthar","Bouarada"],
            "Sousse"=>["Sousse","Sousse Ibn Khaldoun","Sousse Khézama","Sousse Korniche","Sousse Riadh","El Kantaoui","Enfidha","Enfidha Airport","Hammam Sousse","Hammem Sousse Plage","Kalaa Kébira","Msaken"],
            "Tataouine"=>["Tataouine","Ghomrassen"],
            "Tozeur"=>["Tozeur","Tozeur Chokratsi","Nefta","Degache"],
            "Tunis"=>["Bardo","Carthage","Cité El Khadhra","Cité El Mahrajen","Cité El Mhiri","Cité Rommana","Cité Zouhour","Les Berges du Lac","Manar 2","Marsa Safsaf","Menzeh","Mohamed 5","Mont Plaisir","Sidi Hsine","Tunis Airport","Tunis Bab Khadhra","Tunis Bab Mnara","Tunis Bab Souika","Tunis Belvedére","Tunis Hached","Tunis Recette Principale","Tunis République","Tunis Thameur","Zahrouni"],
            "Zaghouan"=>["Zaghouan","El Fahs"]
        ];
        $i=0;
        foreach($this->deliveryOffice as $state=>$offices){
            $this->deliveryState[$i++]=$state;
        }
        
    }
    
    function show(){
        return view('ena_tounsi',["deliveryOffice"=>$this->deliveryOffice]);
    }
    function showoffices(){
        return view('/layouts/ena_tounsi_state_offices',["deliveryOffice"=>$this->deliveryOffice]);
    }
    public function submit(Request $request){
        
        $this->validate($request,[
            "fn"=>["required","string","max:25"],
            "ln"=>["required","string","max:25"],
            "civility"=>["required",Rule::in(["Mr","Mrs","Miss"])],
            "civilstatus"=>["required",Rule::in(["Single","Married","Divorced","Widow"])],
            "nationality"=>["required","string","max:25"],
            "bd"=>["required","date"],
            "bd_place"=>["required","string","max:100"],
            "children"=>["required","numeric","between:0,9"],
            "cin"=>["required","between:1,99999999","numeric","unique:ena_tounsi_form"],
            "cindate"=>["required","date"],
            "cinplace"=>["required","string","max:100"],
            "cincopy"=>["required","file","mimes:pdf","between:0,5120"],
            "por"=>["required",Rule::in(["passport","rpermit","cid"])],
            "pornumber"=>["required","alpha_num"],
            "porexdate"=>["required","date"],
            "porcopy"=>["required","file","mimes:pdf","between:0,5120"],
            "tadress"=>["required","string","max:100"],
            "tcity"=>["required","string","max:100"],
            "tpostalcode"=>["required","between:0,9999","numeric"],
            "tnumber"=>["required","between:10000000,99999999","numeric"],
            "fadress"=>["required","string","max:100"],
            "fcountry"=>["required","string","max:100"],
            "fcity"=>["required","string","max:100"],
            "fpostalcode"=>["required","between:0,9999","numeric"],
            "fnumber"=>["required","numeric"],
            "email"=>["required","email"],
            "profession"=>["required","string","max:100"],
            "ds"=>["required",Rule::in($this->deliveryState)],
            "do"=>["bail","required",Rule::in($this->deliveryOffice[$request->ds ?: "Ben_Arous"])] //here it wont even check for ben arous because we will bail on the firlst validation which is required, we did this only escaping exceptions 
        ]);

        // handling the files
        $cincopy="cin".time().".pdf";
        $request->file('cincopy')->move(public_path('ena_tounsi_files'),$cincopy);
        $porcopy="por".time().".pdf";
        $request->file('porcopy')->move(public_path('ena_tounsi_files'),$porcopy);
        
        $table= new ena_tounsi_form;

        $table->fname = $request->fn;
        $table->lname = $request->ln;
        $table->civility = $request-> civility;
        $table->civilstatus = $request->civilstatus;
        $table->nationality = $request->nationality;
        $table->bd = $request->bd;
        $table->bd_place = $request->bd_place;
        $table->children = $request->children;
        $table->cin = $request->cin;
        $table->cindate = $request->cindate;
        $table->cinplace = $request->cinplace;
        $table->cincopy = $cincopy;
        $table->por = $request->por;
        $table->pornumber = $request->pornumber;
        $table->porexdate = $request->porexdate;
        $table->porcopy = $porcopy;
        $table->tadress = $request->tadress;
        $table->tcity = $request->tcity;
        $table->tpostalcode = $request->tpostalcode;
        $table->tnumber = $request->tnumber;
        $table->fadress = $request->fadress;
        $table->fcountry = $request->fcountry;
        $table->fcity = $request->fcity;
        $table->fpostalcode = $request->fpostalcode;
        $table->fnumber = $request->fnumber;
        $table->email = $request->email;
        $table->profession = $request->profession;
        $table->ds = $request->ds;
        $table->do = $request->do;

        $table->save();

        // return "request recorded successfully";
        
        // return redirect()->action("ena_tounsi_success", ["success_message"=>"The form has been Successfully submitted!!","name"=>$request->fn." ".$request->ln]);
        return redirect()->route("ena_tounsi_success");
    }
}