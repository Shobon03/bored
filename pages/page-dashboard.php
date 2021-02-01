<?php
  require "./components/session.php";

  if ((!isset($_SESSION["dados"]) == true)) {

    unset($_SESSION["dados"]);
    header("location:page-unsuccessful.php");

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bored | Dashboard</title>
  <link rel="stylesheet" href="../styles/page-dashboard.css">
  <?php include_once "./components/imports.php"; ?>
</head>
<body>
  <?php include_once "./components/navbar.php"; ?>
  <div id="user">
    <h1>Seus dados</h1>
    <div class="data">
      <div>
        <?php
          $usuario = $_SESSION["dados"]; 
          echo '<img src="../images/pfp/"' . $usuario["foto_perfil"] . '">';
        ?>        
      </div>
      <div class="all">
        <?php
          include_once "../classes/Usuario.php";

          $usuario = $_SESSION["dados"];
          
          echo '<p><strong>Nome de usuário: </strong>' . $usuario["nome_usuario"] . '</p>
                <p><strong>E-mail: </strong>'. $usuario["email"] . '</p>';

          if ($usuario["data_nascimento"] == "0000-00-00") {

            echo '<p>Atualize sua <strong>data de nascimento!</strong></p>';

          } else {

            echo '<p><strong>Data de nascimento: </strong>'. $usuario["data_nascimento"] . '</p>';

          }
        ?>
      </div>
      <div>
        <a href="./page-update-user.php">Atualizar conta</a>
        <span class="underline"></span>
      </div>
    </div>
    <div class="buttons">
      <a href="./page-all-comments.php" class="comments">Meus comentários</a>
      <?php

        $resultado = Usuario::verificarAdmin($_SESSION["dados"]["nome_usuario"]);
        if ($resultado != false) {

          echo '<a href="./page-insert.php" class="comments">Cadastrar um Passatempo</a>';

        }     
      ?>
      <div>
        <a href="./components/dispose.php" class="logout">Sair</a>
        <span class="underline"></span>
      </div>
    </div>
  </div>
  <?php include_once "./components/bottom-navbar.php"; ?>
</body>
</html>