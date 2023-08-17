<?php

namespace App\Exceptions;

use Throwable;
use App\Exceptions\ShopifyPermissionDenyException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        

        $this->renderable(function (ShopifyPermissionDenyException $e) {    
            return redirect(route('app.install', ['shop' => request()->shop]));
            return redirect(route('app.install', ['shop' => request()->header('Shop')]));
        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
