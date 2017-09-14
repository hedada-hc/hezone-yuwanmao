<?php

namespace App\Http\Controllers\Game;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BettingRepositories;

class BettingController extends Controller
{
	/**
	 * 投注处理
	*/
	protected $Betting;

    public function __construct(BettingRepositories $BettingRepositories){
    	$this->Betting = $BettingRepositories;
    }

    /**
	 * 获取投注记录	
    */
    public function getBetting(){
    	$data = $this->Betting->getBet();

    	return $data[0]->lotter_num;
    }

    /**
	 * 投注
    */
    public function addBetting(Request $request){
    	return $this->Betting->addBet($request);
    	return response()->json(["message" => "success!"]);
    }

    /**
     * 鱼丸28投注
     */
    public function Yw28(Request $request){
        $qihao = $request->get("qihao");
        return view("game.yw28",compact("qihao"));
    }

    /**
    * 获取游戏类型配置/赔率
    */
    public function BetInfo(Request $request, $betType){
        return response()->json([
            "message" => "success",
            "qihao" => $request->get("qihao"),
            "odds" => $this->Betting->BetInfo(["type" => $betType, "qihao" => $request->get("qihao")])
        ]);
    }
}
