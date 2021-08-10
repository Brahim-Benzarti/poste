<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    }
    
    function show(){
        return view('ena_tounsi',["deliveryOffice"=>$this->deliveryOffice]);
    }
    function showoffices(){
        return view('/layouts/ena_tounsi_state_offices',["deliveryOffice"=>$this->deliveryOffice]);
    }
}
