<?php

// Daftarkan semua rute aplikasi di sini.
// Format: route_get('url', ['path/ke/controller.php', 'nama_fungsi']);

route_get('/', ['controllers/home_controller.php', 'index_action']);
route_get('/about', ['controllers/home_controller.php', 'about_action']);
route_get('/products', ['controllers/product_controller.php','products_list_action']);