<?php require "./components/session.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bored | Atualize seu cadastro</title>
  <link rel="stylesheet" href="../styles/page-dashboard.css">
  <link rel="stylesheet" href="../styles/page-update-user.css">
  <?php include_once "./components/imports.php"; ?>
</head>
<body>
  <?php include_once "./components/navbar.php"; ?>
  <div id="user">
    <h1>Atualize seus dados</h1>
    <div class="user-update">
      <form action="./components/update-user.php" method="POST" enctype="multipart/form-data">
        <fieldset>
          <?php
          echo '
          <label for="username">Nome de usuário:</label>
          <input type="text" name="username" value="' . $_SESSION["dados"]["nome_usuario"] . '">
          <br>
          <label for="email">Email:</label>
          <input type="email" name="email" value="' . $_SESSION["dados"]["email"] . '"
          <br>
          <br>
          <label for="date">Data de nascimento:</label>
          <input type="date" name="date" value="' . $_SESSION["dados"]["data_nascimento"] . '">
          <br>
          <label for="profile-picture">Foto de perfil:</label>
          <input type="file" accept="image/*" name="profile-picture" value="' . $_SESSION["dados"]["foto_perfil"] . '">
          ';
          ?>
        </fieldset>
        <button action="submit">Atualizar</button>
      </form>
      
    </div>
    <a href="./page-dashboard.php" class="logout">Voltar</a>
  </div>
  <?php include_once "./components/bottom-navbar.php"; ?>
</body>
</html>