<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Set error handler
set_error_handler(function($severity, $message, $file, $line) {
    throw new ErrorException($message, 0, $severity, $file, $line);
});

// Set exception handler
set_exception_handler(function($exception) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Internal Server Error',
        'message' => $exception->getMessage(),
        'file' => $exception->getFile(),
        'line' => $exception->getLine(),
        'trace' => $exception->getTraceAsString()
    ]);
    exit;
});

try {
    // Clear bootstrap cache for Vercel environment
    $bootstrapCachePath = __DIR__ . '/../bootstrap/cache';
    if (is_dir($bootstrapCachePath)) {
        $files = glob($bootstrapCachePath . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }
    
    // Ensure composer autoloader is loaded
    require_once __DIR__ . '/../vendor/autoload.php';
    
    // Forward Vercel requests to Laravel's public/index.php
    require __DIR__ . '/../public/index.php';
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Laravel Bootstrap Error',
        'message' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine(),
        'trace' => $e->getTraceAsString()
    ]);
    exit;
} catch (Error $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'PHP Fatal Error',
        'message' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine(),
        'trace' => $e->getTraceAsString()
    ]);
    exit;
}