<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lotters;
use App\UserLotters;
use App\User;
use Emoji;
class LottersController extends Controller
{
	/*
     * luck28标准赔率
	*/
	protected $defaultLuck28Odds = [1000,333.3,166.7,100,66.66,47.61,35.71,27.77,22.22,18.18,15.87,14.49,13.69,13.33,13.33,13.69,14.49,15.87,18.18,22.22,27.77,35.71,47.61,66.66,100,166.67,333.33,1000];
	protected $defaultLuck16Odds = [216,72,36,21.6,14.4,10.29,8.64,8,8,8.64,10.29,14.4,21.6,36,72,216];

    public function luck28(Request $request){
    	/*
         * 验证是否非法访问
         * ?time=1503482123&appkey=4fsd4fsd1&sign=d18da3d6fd4ad9f0062cf4a7bb507686
        */
    	$time = str_split($request->get("time"),5);
    	$appkey = str_split($request->get("appkey"),5);
    	$token = md5($time[0].$appkey[1]);
    	$sign = $request->get('sign');
    	return Lotters::where("id",8)->update($this->createNum28(1,false));
    	if($token == $sign){
            //return Lotters::create($this->createNum28(1));
    		return Lotters::update($this->createNum28(1,false));
    	}

        return response()->json(["message" => "非法访问"]);

    }

    /*
	 * 获取开奖数据
    */
    public function queryLotter(Request $request){
        //return Emoji::findByAlias("kissing_heart");
        //return Emoji::findByName("sunglasses");
        //return Emoji::findByUnicode("\u{1F60A}");
        //displays 'blush'
    	return Lotters::where("game_type",$request->get("type"))->latest("created_at")->get();
    }

    /*
	 * 生成28号码
    */
    public function createNum28($type,$new = true){
    	$arr = [

    	];
        if($new){
        	$json = [
        		"num1" => rand(0,9),
        		"num2" => rand(0,9),
        		"num3" => rand(0,9),
        		"lotter_time" => date("m-d h:i"),
        		"game_type" => $type,
        		"odds" => json_encode($this->defaultLuck28Odds)
        	];
        	$json["lotter_res"] = $json['num1'] + $json['num2'] +$json['num3'];
        }else{
            $json = [
                "num1" => null,
                "num2" => null,
                "num3" => null,
                "lotter_time" => date("m-d h:i"),
                "game_type" => $type,
                "odds" => json_encode($this->defaultLuck28Odds)
            ];
            $json["lotter_res"] = null;
        }
    	return $json;
    }

    /*
     * 测试关联关系
    */
    public function test(){
    	$tests = User::find(1);
    	return $tests->with('UserLotter')->where("id",1)->get();
    }


    /*
     * 获取开奖数据
    */
    public function getLotters(){
        $Lotters = Lotters::latest("created_at")->get();
        return response()->json($Lotters);
    }
}
