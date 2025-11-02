<?php
// Database configuration and connection helper.

declare(strict_types=1);

const DB_HOST = 'localhost';
const DB_NAME = 'supersay_mentalux';
const DB_USER = 'root';
const DB_PASS = '';

const AUTH_COOKIE_NAME = 'mentalux_auth';
const AUTH_COOKIE_LIFETIME = 604800; // 7 hari dalam detik.
const AUTH_COOKIE_SECRET = 'mentalux-secret-key-please-change';

/**
 * Create a new MySQLi connection or throw an exception when it fails.
 */
function get_db_connection(): mysqli
{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $connection->set_charset('utf8mb4');
        return $connection;
    } catch (mysqli_sql_exception $exception) {
        throw new RuntimeException('Gagal terhubung ke database: ' . $exception->getMessage(), (int) $exception->getCode(), $exception);
    }
}
