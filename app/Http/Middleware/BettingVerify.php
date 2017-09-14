<?php

namespace App\Http\Middleware;

use Closure;
use App\Repositories\BettingRepositories;

class BettingVerify
{
    protected $Bet;

    public function __construct(BettingRepositories $betting){
        $this->Bet = $betting;
    }

    /**
     * Handle an incoming request.
     * 判断当期是否已经开奖
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){   
        $isLotter = $this->Bet->isNowLotter($request->get("qihao"));
        if($isLotter == null){
            return redirect("/game");
        }
        return $next($request);
    }
}
