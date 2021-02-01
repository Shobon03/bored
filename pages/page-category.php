<?php include_once "./components/session.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php 

    include_once "../classes/Categoria.php";

    $categoria = Categoria::listarPorId($_GET["id"]);
    echo '<title>Bored | Categoria ' . $categoria[0]["nome"] . '</title>';

  ?>
  <?php include_once "./components/imports.php"; ?>
  <link rel="stylesheet" href="../styles/page-results.css">
</head>
<body>
  <?php include_once "./components/navbar.php"; ?>
  <div id="results">
    <?php
      include_once "../classes/Passatempo.php";

      $passatempos = Passatempo::listarPorCategoria($_GET["id"]);
      if ($passatempos != []) {
        
        echo '<h1>Passatempos da categoria ' . $categoria[0]["nome"] . '</h1>
              <div class="all-hobbies">';
        for ($i = 0; $i < count($passatempos); $i++) {

          $dadosPassatempos = Passatempo::listarPorId($passatempos[$i]["id_passatempo"]);
          if ($dadosPassatempos != []) {

            echo '<a class="hobby" href="./page-hobby.php?id=' . $dadosPassatempos[0]["id"] . '&name=' . $dadosPassatempos[0]["nome"] . '"><p>' . $dadosPassatempos[0]["nome"] . '</p></a>';

          }  

        }
        echo "</div>";
      
      } else {

        echo '<div class="no-results">
                <h1>Desculpe, não foi encontrado nenhum passatempo dessa categoria.</h1>
                <br>
                <i class="far fa-frown"></i>
                <a href="./page-categories.php" class="error">Voltar</a>
              </div>';

      }
    ?>
  </div>
  <?php include_once "./components/bottom-navbar.php"; ?>
</body>
</html>