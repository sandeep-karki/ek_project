<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Log;
use Illuminate\Routing\Route;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function __construct(Route $route){
      $this->route = $route;
    }


    /**
     * @param         $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

      if ($request->isMethod('POST') && $request->is('*/login')) {
        if(Auth::attempt(['username' => $request->username,'password'=>$request->password])){

          $data['user_id'] = Auth::user()->id;
          $data['module'] = 'login';
          $data['data'] = "User ".Auth::user()->name ." Logged in at ".date('Y-m-d h:i:s');
            Log::create($data);
        }
      }

      if ($request->isMethod('GET') && $request->is('*/logout')) {
          $data['user_id'] = Auth::user()->id;
          $data['module'] = 'logout';
          $data['data'] = "User ".Auth::user()->name ." logged out at ".date('Y-m-d h:i:s');
          Log::create($data);
      }

      if($request->isMethod('POST') && $request->is('*/store')){
        $action = $this->route->getAction();
        $controller = class_basename($action['controller']);
        list($controller, $action) = explode('@', $controller);
        $name = str_replace("Controller","",$controller);
        $data['user_id'] = Auth::user()->id;
        $data['module'] = $name;
        $data['data'] = "New ".ucfirst($name)." was created by ".Auth::user()->name ." at ".date('Y-m-d h:i:s');
        Log::create($data);
      }

      if($request->isMethod('POST') && $request->is('*/update')){
        $action = $this->route->getAction();
        $controller = class_basename($action['controller']);
        list($controller, $action) = explode('@', $controller);
        $name = str_replace("Controller","",$controller);
        $data['user_id'] = Auth::user()->id;
        $data['module'] = $name;
        $data['data'] = ucfirst($name)." of  id ".$request->id. " was updated by ".Auth::user()->name ." at ".date('Y-m-d h:i:s');
        Log::create($data);
      }

      if($request->isMethod('DELETE') && $request->is('*/destroy')){
        $action = $this->route->getAction();
        $controller = class_basename($action['controller']);
        list($controller, $action) = explode('@', $controller);
        $name = str_replace("Controller","",$controller);
        $data['user_id'] = Auth::user()->id;
        $data['module'] = $name;
        $data['data'] = ucfirst($name)." of  id ".$request->id. " was deleted by ".Auth::user()->name ." at ".date('Y-m-d h:i:s');
        Log::create($data);
      }

      return $next($request);
    }


    /**
     * @param $request
     * @param $response
     */
    public function terminate($request, $response)
    {
        if(!empty($request->all())){
            \Log::info('app.requests', ['ip' => $request->ip(),'user_id' => isset(Auth::user()->id) ? Auth::user()->id : null ,'username' => isset(Auth::user()->username) ? Auth::user()->username : null ,'uri' => !empty($request->fullUrl()) ? $request->fullUrl() : null,'method'=>!empty($request->method()) ? $request->method() : null,'request' => $request->except('password','_token'), 'response' => $response]);
        }
    }
}
