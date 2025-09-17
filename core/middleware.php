<?php


function run_middleware($name)
{
  if ($name === null) {
    return;
  }

  switch ($name) {
    case 'auth':
      if (!isset($_SESSION['user'])) {
        header('Location: /login');
        exit();
      }
      break;

    case 'guest':
      if (isset($_SESSION['user'])) {
        header('Location: /dashboard');
        exit();
      }
      break;

    case 'admin':
      if (!isset($_SESSION['user'])) {
        header('Location: /login');
        exit();
      }
      if ($_SESSION['user']['role'] !== 'admin') {
        http_response_code(403);
        echo "<h1>403 Akses Ditolak</h1><p>Anda tidak memiliki hak untuk mengakses halaman ini.</p>";
        exit();
      }
      break;
  }
}
