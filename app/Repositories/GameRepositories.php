<?php
namespace App\Repositories;

use App\Model\User;
use App\Model\UserLotters;
use App\Model\Lotters;

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
	public function CreateNum($type, $new = true){
		if($new){
        	$json = [
        		"num1" => rand(0,9),
        		"num2" => rand(0,9),
        		"num3" => rand(0,9),
        		"lotter_time" => date("m-d h:i"),
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
                "lotter_time" => date("m-d h:i"),
                "game_type" => $type,
                "odds" => json_encode($this->defaultLuck28Odds)
            ];
            $json["lotter_res"] = null;
        }
    	return $json;
	}

    /**
     * 更新待开奖数据
     * @param  sss
    */
    public function UpdateGuess(){
        $data = Lotters::where('islotter',0)->limit(20)->latest("created_at")->get();
        $test = collect($data)->map(function($item){
            if($item->islotter == 0 && $item->lotter_res == null && $item->num1 == null && $item->num2 == null && $item->num3 == null){
                return $item;
            }
        })->toArray();
        //array_filter 去掉数组中的null值
        return $this->arraySort($test, "id",SORT_DESC);

    }

    public function arraySort($multi_array,$sort_key,$sort=SORT_ASC){
        if(is_array($multi_array)){
            foreach ($multi_array as $row_array){
                if(is_array($row_array)){
                    $key_array[] = $row_array[$sort_key];
                }else{
                    return false;
                }
            }
        }else{
            return false;
        }
        array_multisort($key_array,$sort,$multi_array);
        return $multi_array;
    }
}

?>