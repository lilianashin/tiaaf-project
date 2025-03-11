<?php
//
//use Illuminate\Foundation\Application;
//use Illuminate\Foundation\Configuration\Exceptions;
//use Illuminate\Foundation\Configuration\Middleware;
//
//return Application::configure(basePath: dirname(__DIR__))
//    ->withRouting(
//        web: __DIR__.'/../routes/web.php',
//        commands: __DIR__.'/../routes/console.php',
//        health: '/up',
//    )
//    ->withMiddleware(function (Middleware $middleware) {
//        //
//
//
////    exceptions
//    ->withExceptions(function (Exceptions) {
//
//    })->create();


use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up'
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Define your middleware logic here
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Define your exception handling logic here
    })
    ->create();
