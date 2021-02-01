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
  <title>Bored | Opa!</title>
  <link rel="stylesheet" href="../styles/page-unsuccessful.css">
  <?php include_once "./components/imports.php"; ?>
</head>
<body>
  <?php include_once "./components/navbar.php"; ?>
  <div id="results">
    <div class="error">
      <h1>Passatempo cadastrado com sucesso!</h1>
      <br>
      <i class="fas fa-laugh-beam"></i>
      <a href="./page-hobbies.php" style="width: 300px">Ir para os passatempos</a>
    </div>
    
  </div>  
  <?php include_once "./components/bottom-navbar.php"; ?>
</body>
</html>