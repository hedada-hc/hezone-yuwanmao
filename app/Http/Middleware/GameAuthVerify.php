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
     * @param ?time=1503482123&appkey=4fsd4fsd1&sign=d18da3d6fd4ad9f0062cf4a7bb507686
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $time = str_split($request->get("time"),5);
        $appkey = str_split($request->get("appkey"),5);
        $token = md5($time[0].$appkey[1]);
        $sign = $request->get('sign');
        if($token == $sign){
            return $next($request);
        }
        return response()->json(["error" => "我曹不要非法访问！"]);
    }
}
