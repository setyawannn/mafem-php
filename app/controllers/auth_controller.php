<?php

function login_form_action()
{
  view('auth/login', ['title' => 'Login']);
}

function login_process_action()
{
  $users = [
    'admin' => ['password' => '123', 'name' => 'Administrator', 'role' => 'admin'],
    'user'  => ['password' => '123', 'name' => 'User Biasa', 'role' => 'user']
  ];

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  if (isset($users[$username]) && $users[$username]['password'] === $password) {
    $_SESSION['user'] = [
      'username' => $username,
      'name' => $users[$username]['name'],
      'role' => $users[$username]['role']
    ];
    header('Location: /dashboard');
    exit();
  } else {
    $_SESSION['error'] = 'Username atau password salah.';
    header('Location: /login');
    exit();
  }
}

function logout_action()
{
  session_destroy();
  header('Location: /login');
  exit();
}
