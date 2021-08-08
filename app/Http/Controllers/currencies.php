<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class currencies extends Controller
{
    function toshow(){
        $currencies=array("sar","cad","dkk","aed","usd","gbp","jpy","kwd","nok","qar","sek","chf","eur","bhd","lyd","cny");
        $equivalent=array();
        foreach($currencies as $currency){
            $apifetched=Http::get('https://cdn.jsdelivr.net/gh/fawazahmed0/currency-api@1/latest/currencies/tnd/'.$currency.'.json')->json();
            $equivalent[$currency]["Today"]=$apifetched[$currency];
            $apifetched2=Http::get('https://cdn.jsdelivr.net/gh/fawazahmed0/currency-api@1/'.date("Y-m-d",strtotime('2 days ago')).'/currencies/tnd/'.$currency.'.json')->json();
            if(floatval($equivalent[$currency]["Today"])<floatval($apifetched2[$currency])){
                $equivalent[$currency]["status"]="fall";
            }elseif(floatval($equivalent[$currency]["Today"])>floatval($apifetched2[$currency])){
                $equivalent[$currency]["status"]="rose";
            }else{
                $equivalent[$currency]["status"]="stable";
            };
        };
        return view('currencies', ['currencies'=>$equivalent]);
    }
}
