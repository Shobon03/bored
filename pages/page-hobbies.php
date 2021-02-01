<?php include_once "./components/session.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bored | Todos os Passatempos</title>
  <link rel="stylesheet" href="../styles/page-results.css">
  <?php include_once "./components/imports.php"; ?>
</head>
<body>
  <?php include_once "./components/navbar.php"; ?>
  <div id="results">
    <?php      
      include_once "../classes/Passatempo.php";
      
      $resultadoPassatempos = Passatempo::listarTodos();
      if ($resultadoPassatempos != []) {

        echo '<h1>Todos os Passatempos</h1><div class="all-hobbies">';
        for ($i = 0; $i < count($resultadoPassatempos); $i++) {

          echo '<a class="hobby" href="./page-hobby.php?id=' . $resultadoPassatempos[$i]["id"] . '&name=' . $resultadoPassatempos[$i]["nome"] . '"><p>' . $resultadoPassatempos[$i]["nome"] . '</p></a>';

        }
        echo "</div>";
        
      } else {

        echo '<div class="no-results">
                <h1>Desculpe, não foi encontrado nenhum Passatempo.</h1>
                <br>
                <i class="far fa-frown"></i>
              </div>';

      }
    ?>
  </div>
  <?php include_once "./components/bottom-navbar.php"; ?>
</body>
</html>