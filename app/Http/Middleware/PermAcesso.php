<?php

namespace Gestao_Assistencias\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

class PermAcesso
{

    protected $auth;

    public function __construct(Guard $auth){
            $this->auth =$auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($auth->auth->user()->id !=1){
             Session::flash('message-error','Sem previlegios');
             return redirect()->to('dashb');
        }
        return $next($request);
    }
}
