<?php

// Change to your project root directory
chdir(dirname(__DIR__));

// Check if vendor directory exists, if not create minimal bootstrap
if (!file_exists('vendor/autoload.php')) {
    // Create a minimal response for when Composer dependencies are not available
    http_response_code(500);
    echo json_encode([
        'error' => 'Application dependencies not found',
        'message' => 'Please ensure Composer dependencies are installed'
    ]);
    exit;
}

// Include the Laravel bootstrap
require_once 'public/index.php';