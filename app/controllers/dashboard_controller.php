<?php

function index_action()
{
  $data = [
    'title' => 'Dashboard',
    'user' => $_SESSION['user']
  ];
  view('dashboard/index', $data);
}

function settings_action()
{
  $data = [
    'title' => 'Pengaturan Admin',
    'user' => $_SESSION['user']
  ];
  view('admin/settings', $data);
}
