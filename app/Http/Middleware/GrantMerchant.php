<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class GrantMerchant
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
      if(Auth::guard('merchant')->guest()){
          return redirect('merchant/login')->withError('Can not be accessed, you must login');
      }
      return $next($request);
  }
}
