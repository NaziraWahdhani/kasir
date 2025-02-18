<?php

namespace App\Http\Middleware;

use App\Models\RolePermission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Authorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $path = explode('@', request()->route()->action['controller']);
        $path[0] = ltrim($path[0], '\\');
        $access = false;
        $role_permission = RolePermission::Auth()
            ->ViewPermissions()
            ->where(DB::raw('LOWER(module_features.class)'), strtolower($path[0].'.php'))
            ->where('role_permissions.application_id', 1)
            ->first();
        if ($role_permission) {
            if ($role_permission->permission == 1) {
                $access = true;
            }
        }
        if($access){
            return $next($request);
        }else if($request->ajax() || $request->expectsJson()){
            return response()->json([
                'message' => 'Tidak Memiliki Akses.',
                'error' => 'User does not have the right permissions'
            ], 403);
        }else{
            return response()->view('unauthorized', ['title' => 'Kasir']);
        }
    }
}
