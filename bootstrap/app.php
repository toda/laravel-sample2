<?php

use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::prefix('user')
                ->as('user.')
                ->name('user.')
                ->middleware('web')
                ->group(__DIR__ . '/../routes/web.php');
            Route::prefix('owner')
                ->middleware('web')
                ->as('owner.')
                ->name('owner.')
                ->group(__DIR__ . '/../routes/owner.php');
            Route::prefix('admin')
                ->middleware('web')
                ->as('admin.')
                ->name('admin.')
                ->group(__DIR__ . '/../routes/admin.php');
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo(function (Request $request) {
            if ($request->routeIs('owner*')) {
                // dd('owner');
                return $request->expectsJson() ? null : route('owner.login');
            } else if ($request->routeIs('admin*')) {
                // dd('admin');
                return $request->expectsJson() ? null : route('admin.login');
            } else {
                // dd('user');
                return $request->expectsJson() ? null : route('login');
            }
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
