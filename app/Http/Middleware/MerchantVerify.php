<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class MerchantVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     if(!is_null($request->header('Shop')) AND !is_null($request->bearerToken())){
    //         $user = User::where('shop', $request->header('shop'))->latest()->first();

    //         if(is_null($user)){
    //             return response([
    //                 'message' => 'No merchant found'
    //             ], 500);
    //         }

    //         try{
    //             $decoded = JWT::decode($request->bearerToken(), new Key(Storage::get('jwt/jwtRS256.key.pub'), 'RS256'));
    //         }catch(Exception $e){
    //             abort(401, 'Unauthorized');
    //         }
    //         $request->merge(['user' => $user]);
    //         return $next($request);
    //     }

    //     abort(401, 'Unauthorized');
    // }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!is_null($request->shop)){
            $user = User::where('shop', $request->shop)->latest()->first();

            if(is_null($user)){
                return response([
                    'message' => 'No merchant found'
                ], 500);
            }
            $request->merge(['user' => $user]);
            return $next($request);
        }

        abort(401, 'Unauthorized');
    }
}
