<?php

return [
  'host'     => env_get('DB_HOST', '127.0.0.1'),
  'port'     => env_get('DB_PORT', '3306'),
  'dbname'   => env_get('DB_DATABASE', ''),
  'username' => env_get('DB_USERNAME', 'root'),
  'password' => env_get('DB_PASSWORD', ''),
];
