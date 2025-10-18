<!DOCTYPE html>
<html>
<head>
  <title>Enter Name</title>
  <link rel="stylesheet" href="<?= $base_url ?>/assets/css/style.css">
</head>
<body>
  <div class="container">
    <h2><?= ucfirst($role) ?> Login</h2>
    <form method="POST" action="<?= $base_url ?>/role/submitName">
      <label>Enter your name:</label><br>
      <input type="text" name="name" required>
      <br><br>
      <button type="submit">Continue</button>
    </form>
  </div>
</body>
</html>

