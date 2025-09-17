<?php

function products_list_action()
{
    require_once __DIR__ . '/../../core/database.php';
    require_once __DIR__ . '/../models/product_model.php';

    $db_connection = db_connect();

    if ($db_connection) {
        $products = products_get_all($db_connection);
    } else {
        $products = [];
    }

    log_message('success', 'Halo Cek Satu dua TIga');

    $data = [
        'title' => 'Daftar Produk (MySQLi)',
        'products' => $products
    ];

    view('products/index', $data);
}
