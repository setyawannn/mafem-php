<h1>Silakan Login</h1>
<?php if (isset($_SESSION['error'])): ?>
  <p style="color:red;"><?php echo $_SESSION['error'];
                        unset($_SESSION['error']); ?></p>
<?php endif; ?>

<form action="/login" method="POST">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username"><br><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password"><br><br>
  <button type="submit">Login</button>
</form>