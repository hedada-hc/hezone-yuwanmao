<?php
namespace App\Repositories;

use App\Model\User;
use App\Model\UserLotters;
use App\Model\Lotters;
use \Curl\Curl;

/**
* 2017年8月26日17:21:36
*/
class GameRepositories
{
	/*
     * luck28标准赔率
	*/
	protected $defaultLuck28Odds = [1000,333.3,166.7,100,66.66,47.61,35.71,27.77,22.22,18.18,15.87,14.49,13.69,13.33,13.33,13.69,14.49,15.87,18.18,22.22,27.77,35.71,47.61,66.66,100,166.67,333.33,1000];
	protected $defaultLuck16Odds = [216,72,36,21.6,14.4,10.29,8.64,8,8,8.64,10.29,14.4,21.6,36,72,216];


	/*
     * 创建/更新luck28号码
	*/
	public function CreateNum($type, $new = true, $lotterTime = 90){
		if($new){
        	$json = [
        		"num1" => rand(0,9),
        		"num2" => rand(0,9),
        		"num3" => rand(0,9),
        		"lotter_time" => date("m-d H:i:s",time()+$lotterTime), 
        		"game_type" => $type,
        		"odds" => json_encode($this->defaultLuck28Odds),
                "islotter" => 1
        	];
        	$json["lotter_res"] = $json['num1'] + $json['num2'] +$json['num3'];
        }else{
            $json = [
                "num1" => null,
                "num2" => null,
                "num3" => null,
                "lotter_time" => strlen($lotterTime) == 10 ? date("m-d H:i:s",$lotterTime) : date("m-d H:i:s",time()+$lotterTime), 
                "game_type" => $type,
                "odds" => json_encode($this->defaultLuck28Odds)
            ];
            $json["lotter_res"] = null;
        }
    	return $json;
	}

    /**
     * 获取待开奖数据
     * @param  sss
    */
    public function UpdateGuess($getTime = false){
        //$request = new Curl();
        //$response = $request->get("http://api.k780.com:88/?app=life.time&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=json");
        //设置为LAX  时区
        $data = Lotters::where('islotter',0)->limit(20)->latest("created_at")->get();
        $last = collect($data)->filter(function($value, $key){
            return $value->islotter == 0 && $value->lotter_res == null && $value->num1 == null;
        });
        if($last->count() == 0){
            return $this->initLotter();
        }
        //array_filter 去掉数组中的null值
        // last 获取最后一个
        $lotter = $last->sortByDesc('id')->last();
        $nowTime = time();
        $lotterTime = strtotime(date("Y-").$lotter->lotter_time);
        if($getTime){
            return ["lotterTime" => $lotterTime, "qihao" => $lotter->id];
        }
        //获取最新一起未开奖数据
        $key = $last->count() - 2;
        $toLotter = $last->toArray()[$key];
        $toLotterTime = strtotime(date("Y-").$toLotter['lotter_time']);
        if($nowTime >=  $lotterTime && ($nowTime - $toLotterTime) >= -89 || $nowTime >= $toLotterTime){
            //获取最新一起未开奖时间
            $newLotterTime = $last->first();
            //更新开奖
            $tmp = $this->CreateNum(1);
            $kaijiang = Lotters::where("id",$lotter->id)->update([
                "num1"=> $tmp['num1'],
                "num2"=> $tmp['num2'],
                "num3"=> $tmp['num3'],
                "lotter_res"=> $tmp['lotter_res'],
                "islotter"=> 1,
                "odds"=> $tmp['odds']
                ]);
            //填充新的一期
            return Lotters::create($this->CreateNum(1, false, strtotime(date("Y-").$newLotterTime->lotter_time) + 90));
        }

        return response()->json(["now_time" => date("Y-m-d H:i:s",time()),"nowTime" => $nowTime, "toLotterTime" => $nowTime - $toLotterTime, "lotterTime" => $lotterTime, "geshi" => date("Y-m-d H:i:s",$lotterTime), "test" => abs($nowTime - $lotterTime)]);
    }

    /**
     * 初始化开奖
     * 初始化 新增5期未开
    */
    public function initLotter(){
        $numTime = 0;
        for($i = 0;$i<5;$i++){
            $tmp = $this->CreateNum(1,false);
            if($i == 0){
                $tmp['lotter_time'] = date("m-d H:i:s",time()).":00";  
            }else{
                $tmp['lotter_time'] = date("m-d H:i:s",time() + ( $numTime * 90));  
            }  
            $numTime += 1;
            Lotters::create($tmp);        
        }
        return "kaishile";
    } 

    /*
     * 获取走势数据
    */
    public function queryZouShi($game_id){
        return Lotters::select(["id","lotter_res"])->where(["game_type" => $game_id, "islotter" => 1])->latest("created_at")->limit(200)->get();
    }

}

?>