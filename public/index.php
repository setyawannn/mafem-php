<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Baru setelah autoloader dimuat, kita bisa gunakan class Dotenv
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

require_once __DIR__ . '/../core/functions.php';
require_once __DIR__ . '/../core/router.php';

require_once __DIR__ . '/../routes/web.php';

dispatch();
