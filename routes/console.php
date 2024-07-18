<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

// Definisi route middleware
return [
    'routeMiddleware' => [
        // ...
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        // 'admin' => \App\Http\Middleware\AdminMiddleware::class,
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        'supervisor' => \App\Http\Middleware\SupervisorMiddleware::class,
        'operator' => \App\Http\Middleware\OperatorMiddleware::class,
    ],

    // Definisi perintah artisan
    Artisan::command('inspire', function () {
        $quote = Inspiring::quote();
        $this->comment("Here is your inspiring quote: " . $quote);
    })->describe('Display an inspiring quote')->hourly(),
];
