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
  <link rel="stylesheet" href="../styles/page-comments.css">
  <link rel="stylesheet" href="../styles/page-user-comments.css">
  <?php include_once "./components/imports.php"; ?>
</head>
<body>
  <?php include_once "./components/navbar.php"; ?>
  <div id="user">
    <h1>Seus comentários</h1>
    <div class="data">
      <div class="all-comments">
        <?php
        
          include_once "../classes/Comentario.php";
          include_once "../classes/Passatempo.php";

          $resultado = Comentario::listarComentariosUsuario($_SESSION["dados"]["nome_usuario"]);
          if ($resultado != false) {

            for ($i = 0; $i < count($resultado); $i++) {

              $comentario = $resultado[$i];
              $resultadoPassatempo = Passatempo::listarPorId($resultado[$i]["id_passatempo"]);
              if ($resultadoPassatempo != false) {

                echo '<div class="comment">
                      <div class="comment-contents">       
                        <div class="comment-data">
                          <p><strong>Passatempo</strong>: ' . $resultadoPassatempo[0]["nome"] . '</p>
                          <small class="date">' . $comentario["data"] . ' às ' . $comentario["hora"] . '</small>
                          <p class="content">' . $comentario["texto"] . '</p>
                        </div>
                      </div>                    
                    </div>';

              }              

            }

            echo '</div>';

          } else {

            echo '<h1 class="message">Você ainda não comentou nenhuma vez. Vá em um passatempo e comente! <i class="fas fa-smile-wink"></i></h1>
              </div>';

          }
        
        ?>
      
    </div>
    <a href="./page-dashboard.php" class="logout">Voltar</a>
  </div>
  <?php include_once "./components/bottom-navbar.php"; ?>
</body>
</html>