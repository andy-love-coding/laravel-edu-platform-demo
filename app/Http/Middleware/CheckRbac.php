<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use Auth;

class CheckRbac
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
        // phpinfo(); // 测试下中间件有效没有
        // 验证当前用户是否有权限访问某路由
        $current_user = Auth::guard('admin')->user();        
        if ($current_user->rel_role->role_id != '1') { // 超级管理员有所有权限，不用验证权限
            $route = explode('\\', Route::currentRouteAction()); // 当前访问路由的数组形式
            $current_ac = end($route); // 当前访问的控制器和方法
            $role_ac = $current_user->rel_role->auth_ac; // 当前登录用户的角色的auth_ac字段（即权限范围）
            // stripos忽略大小写，没找到返回false，找到返回位置(可能是0)，必须用===
            if (stripos($role_ac, $current_ac) === false) {
            // 如果访问路由的ac，不在登录用户的ac范围内，则禁止访问
                exit('对不起，您没有权限访问本页面');
            }
        }
        return $next($request);
    }
}
