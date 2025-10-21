<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // return $next($request); hapusa saja ini

        try { // bagian try ini akan melakukan parseToken 
            $user = JWTAuth::parseToken()->authenticate();

            if (!in_array($user->role, $roles)) {
                return response()->json([ // jika di dalam array tersebut tidak ada role yang terdaftar di roles, maka akan mengembalikan response
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }

            return $next($request); // jika berhasil akan mengirimkan request, jika gagal kita catch di bawah

        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Token is invalid or expired'
            ], 401);
        }
    }
}
