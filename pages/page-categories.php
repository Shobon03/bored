<?php include_once "./components/session.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escolha uma categoria</title>
  <link rel="stylesheet" href="../styles/page-categories.css">
  <?php include_once "./components/imports.php"; ?>
</head>
<body>
  <?php include_once "./components/navbar.php"; ?>
  <div id="categories">
    <?php
      require_once "../classes/Categoria.php";

      $categorias = Categoria::listarTodasAsCategorias();
      if ($categorias != []) {
        echo '<h1>Todas as Categorias</h1>';
        for ($i = 0; $i < count($categorias); $i++) {

          echo '<a href="./page-category.php?id=' . $categorias[$i]["id"] . '&name=' . $categorias[$i]["nome"] . '" class="category">
                  <div class="orange"></div>
                  <div class="name">
                    <p>' . $categorias[$i]["nome"] . '</p>
                  </div>
                  <div class="info">
                    <p>' . $categorias[$i]["descricao"] .'</p>
                  </div>        
                </a>';
        }

      } else {

        echo '<div class="no-results">
                <h1>Desculpe, não foi encontrado nenhuma Categoria.</h1>
                <br>
                <i class="far fa-frown"></i>
              </div>';      
              
      }
    ?>    
  </div>

  <?php include_once "./components/bottom-navbar.php"; ?>
</body>
</html>