<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libary\ServerAPI;

class IndexController extends Controller
{
	protected $request;

	public function __construct(Request $request){
		$this->request = $request;
	}
    public function index(Request $request){
		
    	return view('index');
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
}
