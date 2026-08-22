<?php

use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\ReadOnlyAdmin;
use App\Http\Middleware\LangManage;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__.'/../routes/web.php',
            __DIR__.'/../routes/admin.php',
        ],
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'authadmin'     => AuthAdmin::class,
            'readonlyadmin' => ReadOnlyAdmin::class,
            'langmanage'    => LangManage::class
        ]);

        $middleware->appendToGroup('web', [
            LangManage::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
