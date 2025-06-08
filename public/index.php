<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Load Environment Variables for Vercel
|--------------------------------------------------------------------------
|
| In Vercel, environment variables are passed through the runtime.
| We need to ensure they are available before Laravel bootstrap.
|
*/

if (isset($_ENV['VERCEL']) || isset($_ENV['APP_STORAGE_PATH'])) {
    // Ensure all Vercel environment variables are available
    $vercelEnvVars = [
        'APP_ENV' => 'production',
        'APP_DEBUG' => 'true',
        'APP_URL' => 'https://rumah-gadai-fix.vercel.app',
        'LOG_CHANNEL' => 'stderr',
        'SESSION_DRIVER' => 'cookie',
        'CACHE_DRIVER' => 'array',
        'QUEUE_CONNECTION' => 'sync',
        'DB_CONNECTION' => 'array',
        'APP_KEY' => 'base64:J4qL/tQdsizE1eIm/Lm1OzJgaXdK0tMBy0Q55NAGIKA=',
        'LOG_LEVEL' => 'debug',
        'SESSION_SECURE_COOKIE' => 'true',
        'VIEW_COMPILED_PATH' => '/tmp/views',
        'APP_STORAGE_PATH' => '/tmp/storage',
        'CACHE_PATH' => '/tmp/cache',
        'LOG_PATH' => '/tmp/logs',
        'SESSION_LIFETIME' => '120',
        'VERCEL' => '1'
    ];
    
    foreach ($vercelEnvVars as $key => $value) {
        if (!isset($_ENV[$key])) {
            $_ENV[$key] = $value;
            putenv("$key=$value");
        }
    }
}

/*
|--------------------------------------------------------------------------
| Create Required Directories for Vercel
|--------------------------------------------------------------------------
|
| Create necessary directories in /tmp for Vercel's read-only filesystem.
| This ensures Laravel can write to required directories.
|
*/

if (isset($_ENV['VERCEL']) || isset($_ENV['APP_STORAGE_PATH'])) {
    $dirs = [
        '/tmp/storage/logs',
        '/tmp/storage/app/public',
        '/tmp/storage/framework/cache/data',
        '/tmp/storage/framework/sessions',
        '/tmp/storage/framework/testing',
        '/tmp/storage/framework/views',
        '/tmp/views',
        '/tmp/cache',
        '/tmp/bootstrap/cache'
    ];
    
    foreach ($dirs as $dir) {
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
    }
}

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
