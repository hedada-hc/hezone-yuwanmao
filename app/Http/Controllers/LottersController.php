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
        return Lotters::create($this->GameRepositories->CreateNum(1,false));
        return Lotters::where("id",11)->update($this->GameRepositories->CreateNum(1,false));
    }


    /*
	 * 获取开奖数据
    */
    public function queryLotter(Request $request){
    	return Lotters::where(["game_type" => $request->get("type")])->orderBy("id","DESC")->limit(20)->get();
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

    /*
     * 开奖时间   
    */
    public function lotterTime(){
        $data = $this->GameRepositories->UpdateGuess(true);
        return response()->json([
            "message" => "success",
            "result" => [
                "time" => abs(time() - $data['lotterTime']),
                "qihao" => $data['qihao']
            ]
            
        ]);
    }

    /*
     * 分页数据   
    */
    public function Page(Request $request){
        $count = Lotters::where("game_type",$request->get("type"))->count();
        if($request->get("page")){
            $page = (abs($request->get("page")) * 20) - 20;
            $pageData = Lotters::where("game_type",$request->get("type"))->latest("created_at")->offset($page)->limit(20)->get();
        }else{
            $pageData = Lotters::where("game_type",$request->get("type"))->latest("created_at")->offset(0)->limit(20)->get();
        }

        return response()->json([
            "message" => "success",
            "result" => $pageData,
            "count" => $count
        ]);
    }

    /*
     * 走势
    */
    public function ZouShi($game_id){
        return view('game.zoushi', compact("game_id"));
    }

    /*
     * 获取走势数据
    */
    public function queryZouShi($game_id){
        $data = $this->GameRepositories->queryZouShi($game_id);
        return response()->json([
            "message" => 'success',
            "result" => $data
        ]);
    }
}
