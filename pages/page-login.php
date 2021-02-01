<?php include_once "./components/session.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bored | Faça seu login</title>
  <link rel="stylesheet" href="../styles/page-login.css">
  <?php include_once "./components/imports.php"; ?>
</head>
<body>
  <?php include_once "./components/navbar.php"; ?>
  <div id="login">
    <h1>Fazer login</h1>
    <form method="POST" action="./components/start-login-session.php">
      <label for="username">Nome de usuário</label>   
      <input type="text" name="username" placeholder="Digite seu nome de usuário" required>
    
      <label for="passwd">Senha</label>   
      <input type="password" name="passwd" placeholder="Digite sua senha" required>

      <button action="submit" class="submit">Vamos nessa!</button>
    </form>
  </div>
  <?php include_once "./components/bottom-navbar.php"; ?>
</body>
</html>