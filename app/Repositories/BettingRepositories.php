<?php
namespace App\Repositories;

use App\Model\Lotters;
use App\Model\User;
use App\Model\LotterUser;

/**
* 
*/
class BettingRepositories{
	/**
	* 28默认赔率
	*/
	protected $luck28Odds = [1000,333.3,166.7,100,66.66,47.61,35.71,27.77,22.22,18.18,15.87,14.49,13.69,13.33,13.33,13.69,14.49,15.87,18.18,22.22,27.77,35.71,47.61,66.66,100,166.67,333.33,1000];
	protected $luck16Odds = [216,72,36,21.6,14.4,10.28,8.64,8,8,8.64,10.28,14.4,21.6,36,72,216];

	/**
    * 追加投注
	*/
	public function addBet($request){
		$data = [
			"user_id" => 103,
			"lotters_id" => 5910,
			"game_type" => 1,
			"lotter_num" =>json_encode([
				10 => 100,
				11 => 100,
				12 => 100,
				13 => 100,
				14 => 100
			])
		];
		return LotterUser::create($data);
	}

	/**
     * 获取投注记录
	*/
	public function getBet(){
		return LotterUser::all();
	}

	/**
	* 判断当前是否已经开奖
	*/
	public function isNowLotter($qihao){
		return Lotters::where(["id" => $qihao,"islotter" => 0])->first();
	}

	/**
	* 获取游戏配置赔率
	*/
	public function BetInfo($info){
		if($info['type'] == 1){
			return $this->luck28Odds;
		}
		return $this->luck16Odds;
	}
}

?>