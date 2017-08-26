<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Lotters;
use App\Model\UserLotters;
use App\Model\User;
use App\Repositories\GameRepositories;
class LottersController extends Controller
{

    protected $GameRepositories;

    public function __construct(GameRepositories $GameRepositories){

        $this->GameRepositories = $GameRepositories;
    }

    public function luck28(Request $request){
        return Lotters::create($this->GameRepositories->CreateNum(1,true));
        return Lotters::where("id",4)->update($this->GameRepositories->CreateNum(1,true));
    }


    /*
	 * 获取开奖数据
    */
    public function queryLotter(Request $request){
    	return Lotters::where("game_type",$request->get("type"))->latest("created_at")->get();
    }


    /*
     * 测试关联关系
    */
    public function test(){
    	// $tests = User::find(1);
    	// return $tests->with('UserLotter')->where("id",1)->get();
        return $this->GameRepositories->UpdateGuess();
    }


    /*
     * 获取开奖数据
    */
    public function getLotters(){
        $Lotters = Lotters::latest("created_at")->get();
        return response()->json($Lotters);
    }
}
