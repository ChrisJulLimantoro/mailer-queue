<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Container\Container;
use Illuminate\Http\Request;
use App\Exceptions\Handler as AuthHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * RETURN AUTHENTICATED NOT REDIRECT TO
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : json_encode(['error' => 'Unauthenticated.'],401);
    }
}
