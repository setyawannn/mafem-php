<?php

// config/app.php

return [
  'name' => env_get('APP_NAME', 'Aplikasi PHP Saya'),
  'env' => env_get('APP_ENV', 'production'),

  'base_url' => env_get('BASE_URL', 'http://localhost')
];
