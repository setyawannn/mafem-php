<?php

/**
 * Membuat dan mengembalikan instance koneksi MySQLi.
 * Koneksi dibuat hanya sekali.
 *
 * @return mysqli|null
 */
function db_connect()
{
    static $connection = null;

    if ($connection === null) {
        $host = config('database.host');
        $user = config('database.username');
        $pass = config('database.password');
        $db   = config('database.dbname');
        $port = config('database.port');

        $connection = mysqli_connect($host, $user, $pass, $db, $port);

        if (mysqli_connect_errno()) {
            error_log("Koneksi database gagal: " . mysqli_connect_error());
            return null;
        }

        mysqli_set_charset($connection, 'utf8mb4');
    }

    return $connection;
}
