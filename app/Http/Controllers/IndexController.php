<?php

namespace App\Http\Controllers;
use GeetestLib;
use Illuminate\Http\Request;
use App\Libary\ServerAPI;

class IndexController extends Controller
{
	protected $request;

	public function __construct(Request $request){
		$this->request = $request;
	}
    public function index(Request $request){
		
    	return view('game.game');
    }

    /*
	 * 注册验证码
    */
    public function regCode(){
    	//网易云信分配的账号，请替换你在管理后台应用下申请的Appkey
		$AppKey = '0818deea53d43885de4ba850677edd49';
		//网易云信分配的账号，请替换你在管理后台应用下申请的appSecret
		$AppSecret = '2d23c291f9fe';
		$sms = new ServerAPI($AppKey,$AppSecret,'fsockopen');     //fsockopen伪造请求

		//发送模板短信
		dd( $sms->sendSMSTemplate('3056779',array('13797408246','13080671541','18620828235'),array('hezone' ,'951374')));
    }

    /*
     * 极验验证码
    */
    public function getVerify(){
    	//实例化并传入极验ID与key值
    	$GtSdk = new GeetestLib(config('sys.GEE_ID'), config('sys.GEE_KEY'));
    	$user_id = "web";
    	$status = $GtSdk->pre_process($user_id);
    	$data = [
    		"gtserver" => $status,
    		"user_id" => $user_id
    	];

    	session(['geetest' => $data]);
    	echo $GtSdk->get_response_str();
    }

    /*
    */
    public function login(){
    	$GetSdk = Geetestlib(config('sys.GEE_ID'), config('sys.GEE_KEY'));
    	$geetest = session('geetest');
    	$user_id = $geetest('user_id');

    	if($geetest('gtserver') == 1){
    		$result = $GtSdk->success_validate($geetest_challenge, $geetest_validate, $geetest_seccode, $user_id);
    		if($result){
    			dd("yes!");
    		}else{
    			dd("No!");
    		}
    	}else{
    		if($GtSdk->fail_validate($geetest_challenge, $geetest_validate, $geetest_seccode)){
    			dd("yes~");
    		}else{
    			dd("no!`");
    		}
    	}
    }

    public function home(){
        
        return view("welcome");
    }

    public function geetestView(){
        return view("home");
    }
}
