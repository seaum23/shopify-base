<?php

namespace App\Http\Controllers;

use App\Models\User;
use Shopify\Auth\OAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Shopify\Auth\OAuthCookie;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'shop'
        ]);

        $url = OAuth::begin(
            $request->shop,
            '/authenticate',
            false,
            function(OAuthCookie $cookie) {
                Cookie::queue(
                    $cookie->getName(),
                    $cookie->getValue(),
                    $cookie->getExpire() ? ceil(($cookie->getExpire() - time()) / 60) : null,
                    '/',
                    parse_url(config('app.url'))['host'],
                    $cookie->isSecure(),
                    $cookie->isHttpOnly(),
                    false,
                    'Lax'
                );
                return true;
            }
        );
        
        return redirect($url);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $session = OAuth::callback(
            Cookie::get(),
            $request->only('code', 'hmac', 'host', 'shop', 'state', 'timestamp'),
            function(OAuthCookie $cookie) {
                Cookie::queue(
                    $cookie->getName(),
                    $cookie->getValue(),
                    $cookie->getExpire() ? ceil(($cookie->getExpire() - time()) / 60) : null,
                    '/',
                    parse_url(config('app.url'))['host'],
                    $cookie->isSecure(),
                    $cookie->isHttpOnly(),
                    false,
                    'Lax'
                );
                return true;
            }
        );

        $user = User::create([
            'shop' => $session->getShop(),
            'token' => $session->getAccessToken(),
        ]);

        Auth::login($user);

        return redirect(route('home.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
