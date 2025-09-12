<?php

/**
 * Menampilkan file view beserta datanya.
 *
 * @param string $viewName Nama file view (tanpa .php).
 * @param array $data Data yang akan diekstrak menjadi variabel.
 */
function view($viewName, $data = []) {
    // Ekstrak array menjadi variabel (misal: $data['title'] menjadi $title)
    extract($data);

    // Memuat bagian header, konten, dan footer
    require_once __DIR__ . '/../app/views/layouts/header.php';
    require_once __DIR__ . '/../app/views/' . $viewName . '.php';
    require_once __DIR__ . '/../app/views/layouts/footer.php';
}