<h1>Selamat Datang di Dashboard, <?php echo htmlspecialchars($user['name']); ?>!</h1>
<p>Anda login sebagai: <strong><?php echo htmlspecialchars($user['role']); ?></strong></p>

<?php if ($user['role'] === 'admin'): ?>
  <p><a href="/admin/settings">Buka Pengaturan Admin</a></p>
<?php endif; ?>

<p><a href="/logout">Logout</a></p>