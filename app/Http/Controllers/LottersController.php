<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lotters;

class LottersController extends Controller
{
    public function luck28(Request $request){
    	$time = str_split($request->get("time"),5);
    	$appkey = str_split($request->get("appkey"),5);
    	$token = md5($time[0].$appkey[1]);
    	$sign = $request->get('sign');
    	
    	if($token == $sign){
    		return "test Lotter";
    	}
    }
}
