<?php

namespace App\Http\Middleware;

use App\Models\UserPermission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class EnsureUserRoleIsAllowedToAccess
{
    // dashboard, pages, navigation-menus

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        echo 'the middleeare access.</br>';

        $userRole = auth()->user()->role;
        $currentRouteName = Route::currentRouteName();

        echo 'UserRole: ' .$userRole .'</br>';
        echo 'Curent Route Name: ' .$currentRouteName .'</br>';

        return $next($request);

    }

    /**
     * The default user access role.
     *
     * @return void
     */
    private function defaultUserAccessRole()
    {
        return [
            'admin' => [
                'user-permissions',
            ],
        ];
    }
}