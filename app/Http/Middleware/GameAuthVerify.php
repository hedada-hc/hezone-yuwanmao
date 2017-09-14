<?php

namespace App\Http\Middleware;

use Closure;

class GameAuthVerify
{
    /**
     * Handle an incoming request.
     * 验证是否非法访问
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param ?time=1503482123&sign=d18da3d6fd4ad9f0062cf4a7bb507686
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $appkey = "HeZone9527";
        if($request->get("sign") && (time() - $request->get("time")) <= 5 ){
            $time = str_split($request->get("time"),5);
            $appkey = str_split($appkey,5);
            $token = md5($time[1].$appkey[1]);
            $sign = $request->get('sign');
            // dd($time,$appkey,$token,$sign);
            if($token == $sign){
                return $next($request);
            }
        }
        return response()->json(["error" => "访问失败!"]);
    }

    
}
