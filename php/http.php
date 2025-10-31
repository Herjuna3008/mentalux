<?php

declare(strict_types=1);

/**
 * Handle CORS headers and exit early for preflight requests.
 */
function handle_preflight_request(array $allowedMethods = ['POST']): void
{
    $methodList = array_unique(array_merge(array_map('strtoupper', $allowedMethods), ['OPTIONS']));
    $methodsHeader = implode(', ', $methodList);

    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
        header('Access-Control-Allow-Credentials: true');
        header('Vary: Origin');
    }

    header('Access-Control-Allow-Methods: ' . $methodsHeader);
    header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(204);
        exit;
    }
}
