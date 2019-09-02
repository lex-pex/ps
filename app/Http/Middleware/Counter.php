<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\DailyVisit;
use App\Models\Visit;

class Counter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $count = true;
        $user = Auth::user();
        if($user == null) $count = true;
        elseif($user->role == 'admin') $count = false;
        if($count) $this->record($user);
        return $next($request);
    }

    private function record($user) {
        $urn = isset($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : '/';
        $userId = 0;
        if($user != null) $userId = $user->id;
        if($v = Visit::where('page', $urn)->first()) {
            $v->increment('amount');
        } else {
            $v = new Visit();
            $v->page = $urn;
            $v->user = $userId;
            $v->amount = 1;
            $v->save();
        }
        $d = date('Y/m/d');
        if($dv = DailyVisit::where('date', $d)->first()) {
            $dv->increment('amount');
        } else {
            $visit = new DailyVisit();
            $visit->date = $d;
            $visit->amount = 1;
            $visit->save();
        }
    }
}
