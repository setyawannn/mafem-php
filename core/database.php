<?php

/**
 * Membuat dan mengembalikan instance koneksi MySQLi.
 * Koneksi dibuat hanya sekali.
 *
 * @return mysqli|null
 */
function db_connect() {
    static $connection = null;

    if ($connection === null) {
        $host = $_ENV['DB_HOST'];
        $user = $_ENV['DB_USERNAME'];
        $pass = $_ENV['DB_PASSWORD'];
        $db   = $_ENV['DB_DATABASE'];
        $port = $_ENV['DB_PORT'];

        $connection = mysqli_connect($host, $user, $pass, $db, $port);

        if (mysqli_connect_errno()) {
            error_log("Koneksi database gagal: " . mysqli_connect_error());
            return null;
        }

        mysqli_set_charset($connection, 'utf8mb4');
    }

    return $connection;
}