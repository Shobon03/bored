<?php require "./components/session.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bored | Opa!</title>
  <link rel="stylesheet" href="../styles/page-unsuccessful.css">
  <?php include_once "./components/imports.php"; ?>
</head>
<body>
  <?php include_once "./components/navbar.php"; ?>
  <div id="results">
    <div class="error">
      <h1>Opa, parece que algo de errado não deu certo!
      <?php  
      if ($_GET["erro"] == "login") {

        echo "Esse usuário não existe.";

      } else if ($_GET["erro"] == "cadastro-usuario") {

        echo "Erro em seu cadastro.";

      } else if ($_GET["erro"] == "cadastro-passatempo") {

        echo "Erro no cadastro de passatempo.";

      } else if ($_GET["erro"] == "atualizar-passatempo") {
        
        echo "Erro na atualização do passatempo.";

      } else if ($_GET["erro"] == "liberar-comentario") {
        
        echo "Erro na liberação do comentário.";

      } else if ($_GET["erro"] == "atualizar-usuario") {
        
        echo "Erro na atualização do usuário.";

      } else {

        echo "Erro no cadastro do comentário.";

      }
      echo '</h1>
      <br>
      <i class="fas fa-question"></i>';
      if ($_GET["erro"] == "login") {

        echo '<a href="./page-login.php">Voltar</a>';

      } else if ($_GET["erro"] == "cadastro-usuario") {

        echo '<a href="./page-sign-up.php">Voltar</a>';

      } else {

        if (isset($_SESSION["dados"]) && $_GET["erro"] == "cadastro-passatempo") {

          echo '<a href="./page-insert.php">Voltar</a>';

        } else if ($_GET["erro"] == "cadastro-comentario" || $_GET["erro"] == "atualizar-passatempo") {

          echo '<a href="./page-hobby.php?id=' . $_GET["id"] . '">Voltar</a>';

        } else if ($_GET["erro"] == "atualizar-usuario") {
        
          echo '<a href="./page-dashboard.php">Voltar</a>';
  
        } else if ($_GET["erro"] == "liberar-comentario") {
        
          echo '<a href="./page-hobby.php' . $_GET["id"] . '">Voltar</a>';
  
        } else {

          echo '<a href="./">Voltar</a>';

        }

      }
      
      ?>
    </div>
    
  </div>  
  <?php include_once "./components/bottom-navbar.php"; ?>
</body>
</html> 