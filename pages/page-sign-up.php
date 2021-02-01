<?php include_once "./components/session.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bored | Cadastre-se</title>
  <link rel="stylesheet" href="../styles/page-sign-up.css">
  <?php include_once "./components/imports.php"; ?>
</head>
<body>
  <?php include_once "./components/navbar.php"; ?>
  <div id="sign-up">
    <div class="sign">
      <h1>Faça seu cadastro</h1>

      <form action="./components/complete-sign-up.php" method="POST">
        <div class="camp">
          <label for="e-mail">Email</label>
          <input type="email" class="data" name="e-mail" placeholder="Digite seu e-mail" required>
        </div>

        <div class="camp">
          <label for="username">Nome de usuário</label>
          <input type="text" class="data" name="username" placeholder="Digite um nome de usuário" required>
        </div>

        <div class="camp">
          <label for="passwd">Senha</label>
          <input type="password" class="data" name="passwd" placeholder="Digite uma senha forte (8+ caracteres variados)" required>
        </div>     

        <div class="camp">
          <label for="passwd-confirm">Confirmação de senha</label>
          <input type="password" class="data" name="passwd-confirm" placeholder="Confirme sua senha" required>
        </div>

        <p class="TOS"><input type="checkbox" required> Concordo com os <a href="./page-tos.php">Termos e Política de Privacidade</a>.</p>
        <button action="submit">Vamos nessa!</button>
      </form>
    </div>

    <div class="side">
      <div class="login">
        <h1>Já possui uma conta?</h1>
        <a href="page-login.php">Fazer login</a>   
      </div>
    </div>
  </div>
  <?php include_once "./components/bottom-navbar.php"; ?>
</body>
</html>