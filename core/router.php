<?php

// Variabel global untuk menyimpan semua rute yang terdaftar
$routes = [];

/**
 * Mendaftarkan sebuah rute dengan method GET.
 *
 * @param string $uri URL yang akan dicocokkan.
 * @param string $action File controller dan fungsi yang akan dijalankan.
 */
function route_get(string $uri, array $action) {
    global $routes;
    $routes['GET'][$uri] = $action;

    // var_dump($routes['GET'][$uri]);
    // die();
}

/**
 * Mencari rute yang cocok dan menjalankan aksi yang sesuai.
 */
function dispatch() {
    global $routes;

    $basePath = dirname($_SERVER['SCRIPT_NAME']);
    $requestUri = strtok($_SERVER['REQUEST_URI'], '?');
    $uri = '/' . trim(str_replace($basePath, '', $requestUri), '/');
    $method = $_SERVER['REQUEST_METHOD'];

    // var_dump("Routes", $routes);
    // var_dump("Method", $method);
    // var_dump("Uri", $uri);
    // var_dump(isset($routes[$method][$uri]));
    // die();

    if (isset($routes[$method][$uri])) {
        $action = $routes[$method][$uri];
        
        // Memisahkan path file controller dan nama fungsi
        // Contoh: ['controllers/home_controller.php', 'index_action']
        $controllerFile = __DIR__ . '/../app/' . $action[0];
        $functionName = $action[1];

        // Jika file controller ada, muat dan panggil fungsinya
        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            if (function_exists($functionName)) {
                // Panggil fungsi yang dituju
                $functionName();
            } else {
                echo "Error: Fungsi '$functionName' tidak ditemukan.";
            }
        } else {
            echo "Error: File controller tidak ditemukan.";
        }
    } else {
        http_response_code(404);
        echo "404 Halaman Tidak Ditemukan";
    }
}