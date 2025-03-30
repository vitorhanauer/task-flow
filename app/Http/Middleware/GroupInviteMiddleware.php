<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GroupInviteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = Auth::user();
        $groups = $user->groups;
        $groupRequest = $request['group'];
        foreach($groups as $group){
            if($group->id == $groupRequest->id) return $next($request);
        }

        return to_route('group.index')->withErrors(['Acesso ao grupo não autorizado']);

    }
}
