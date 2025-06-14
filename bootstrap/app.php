<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);



/*
|--------------------------------------------------------------------------
| Bootstrap Facades for Vercel
|--------------------------------------------------------------------------
|
| Bootstrap the facade root to prevent "A facade root has not been set"
| errors in serverless environments.
|
*/

if (isset($_ENV['VERCEL']) || isset($_ENV['APP_STORAGE_PATH'])) {
    // Set the facade application instance
    Illuminate\Support\Facades\Facade::setFacadeApplication($app);
    
    // Bootstrap essential services
    $app->singleton('view', function ($app) {
        return new Illuminate\View\Factory(
            $app['view.engine.resolver'],
            $app['view.finder'],
            $app['events']
        );
    });
    
    $app->singleton('view.finder', function ($app) {
        return new Illuminate\View\FileViewFinder(
            $app['files'],
            [resource_path('views')]
        );
    });
    
    $app->singleton('view.engine.resolver', function () {
        return new Illuminate\View\Engines\EngineResolver();
    });
    
    $app->singleton('files', function () {
        return new Illuminate\Filesystem\Filesystem();
    });
    
    $app->singleton('events', function () {
        return new Illuminate\Events\Dispatcher();
    });
}

/*
|--------------------------------------------------------------------------
| Configure Storage Path for Vercel
|--------------------------------------------------------------------------
|
| Override the storage path to use /tmp directory in serverless environments
| like Vercel where the filesystem is read-only except for /tmp.
|
*/

if (isset($_ENV['VERCEL']) || isset($_ENV['APP_STORAGE_PATH'])) {
    $app->useStoragePath($_ENV['APP_STORAGE_PATH'] ?? '/tmp/storage');
    
    // Set bootstrap cache path for Vercel
    $app->useBootstrapPath('/tmp/bootstrap');
    
    // Override bootstrap process to skip LoadEnvironmentVariables
    $app->singleton('Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables', function () {
        return new class {
            public function bootstrap($app) {
                // Skip .env loading in Vercel - environment variables are already loaded
            }
        };
    });
}

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
