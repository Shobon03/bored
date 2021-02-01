<?php include_once "./components/session.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bored | Descubra hobbies e passatempos</title>
  <link rel="stylesheet" href="../styles/page-results.css">
  <?php include_once "./components/imports.php"; ?>
</head>
<body>
  <?php include_once "./components/navbar.php"; ?>
  <div id="results">
    <?php
      include_once "../classes/Passatempo.php";
      include_once "../classes/Categoria.php";

      $pesquisa = $_POST["search-word"];
      $resultadoPassatempos = Passatempo::listarPorNome($pesquisa);
      $resultadoCategoria = Categoria::listarPorNome($pesquisa);
      if ($resultadoPassatempos != []) {

        echo '<h1>Passatempos</h1><div class="all-hobbies">';
        for ($i = 0; $i < count($resultadoPassatempos); $i++) {

          echo '<a class="hobby" href="./page-hobby.php?id=' . $resultadoPassatempos[$i]["id"] . '&name=' . $resultadoPassatempos[$i]["nome"] . '"><p>' . $resultadoPassatempos[$i]["nome"] . '</p></a>';

        }
        echo "</div>";

      }
      
      if ($resultadoCategoria != []) {

        echo '<h1>Categorias</h1><div class="all-categories">';
        for ($i = 0; $i < count($resultadoCategoria); $i++) {

          echo '<a class="category" href="./page-category.php?id=' . $resultadoCategoria[$i]["id"] . '&name=' . $resultadoCategoria[$i]["nome"] . '"><p>' . $resultadoCategoria[$i]["nome"] . '</p></a>';

        }
        echo '</div>';

      } 
      
      if ($resultadoCategoria == [] && $resultadoPassatempos == []) {

        echo '<div class="no-results">
                <h1>Ops, sua pesquisa não retornou nada. Tente fazer outra pesquisa.</h1>
                <br>
                <i class="far fa-frown"></i>
              </div>';

      }      
    ?>    
  </div>
  <?php include_once "./components/bottom-navbar.php"; ?>
</body>