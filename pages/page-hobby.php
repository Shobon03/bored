<?php include_once "./components/session.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php echo '<title>Bored | ' . $_GET["name"] . '</title>' ?>
  <link rel="stylesheet" href="../styles/page-hobby.css">
  <?php include_once "./components/imports.php"; ?>
</head>
<body>
  <?php include_once "./components/navbar.php"; ?>
  <div id="hobby">
    <?php 
    
      include_once "../classes/Passatempo.php";

      $resultado = Passatempo::listarPorId($_GET["id"]);
      if ($resultado != false) {

        $passatempo = $resultado[0];
        echo '
        <h1 class="hobby-title">' . $passatempo["nome"] . '</h1>
        <div class="hobby-image">
          <img src="' . $passatempo["caminho_foto"] . '">
        </div>
        <div class="hobby-info">
          <h1>' . $passatempo["informacao"] . '</h1>
        </div> 
        <div class="how">
          '. $passatempo["instrucoes"] .'
        </div>';

      } else {

        echo '<div class="no-results">
                <h1>Ops, sua pesquisa não retornou nada. Tente fazer outra pesquisa.</h1>
                <br>
                <i class="far fa-frown"></i>
              </div>';

      }   
    ?>
      <h1 class="comments">Comentários</h1>
      <div class="hobby-comments">
      <?php

        include_once "../classes/Comentario.php";
        include_once "../classes/Usuario.php";

        $resultado = Comentario::listarComentarios($_GET["id"]);
        if (count($resultado) > 0) {

          $barrado = 0;

          for ($i = 0; $i < count($resultado); $i++) {

            $comentario = $resultado[$i];

            if ($comentario["e_liberado"] == 1) {

              $foto = file_exists("../images/pfp" . $comentario["foto_perfil"]) ? $comentario["foto_perfil"] : "blank.png";

              echo '
                <div class="comment-contents">
                  <img src="../images/pfp/'. $foto . '">        
                    <div class="comment-data">
                      <strong class="username">' . $comentario["nome_usuario"] . '</strong><small class="date">' . $comentario["data"] . ' às ' . $comentario["hora"] . '</small>
                      <p class="content">' . $comentario["texto"] . '</p>
                    </div>                   
                </div>';

            } else {

              if (isset($_SESSION["dados"])) {

                if ($_SESSION["dados"]["admin"] == 1) {

                  echo '
                    <div class="comment-contents">
                      <img src="../images/pfp/'. $foto . '">        
                        <div class="comment-data">
                          <strong class="username">' . $comentario["nome_usuario"] . '</strong><small class="date">' . $comentario["data"] . ' às ' . $comentario["hora"] . '  <a href="./components/permit-comment.php?id_comentario=' . $comentario["id"] . '&id_passatempo=' . $_GET["id"] . '">Liberar comentário</a></small>
                          <p class="content">' . $comentario["texto"] . '</p>
                        </div>                   
                    </div>';

                }

              }

            }  

          }
          echo '</div>';

        } else {

         echo '<h1>Esse passatempo não possui nenhum comentario. Seja o primeiro a comentar! <i class="fas fa-smile-wink"></i></h1>
              </div>';

        }

        if (isset($_SESSION["dados"])) {

          echo '<button class="write" onclick="show()">Escreva um comentário</button>
                <div id="comment-box">
                <span onclick="hide()"><i class="fas fa-times"></i></span>
                  <form action="./components/insert-comment.php?id=' . $_GET["id"] . '" method="POST">
                    <filedset>
                      <textarea placeholder="Escreva seu comentário" name="comment"></textarea>
                      <button action="submit">Comentar</button>
                    </fieldset>
                  </form>
                </div>';

          $resultado = Usuario::verificarAdmin($_SESSION["dados"]["nome_usuario"]);
          if ($resultado != false) {

            echo '<a href="./page-update-hobby.php?id=' . $_GET["id"] . '" class="update">Atualizar passatempo</a>';

          }

        } else {

          echo '<h1 class="message-login"><a href="./page-login.php">Faça login</a> para comentar!</h1>';

        }

      ?>   
  </div>
  <?php include_once "./components/bottom-navbar.php"; ?>
  <script>
    function show() {

      if (document.getElementById("comment-box").style.display !== "block") {

        document.getElementById("comment-box").style.display = "block";

      }

    }

    function hide() {

      if (document.getElementById("comment-box").style.display !== "none") {

        document.getElementById("comment-box").style.display = "none";

      }

    }
  </script>
</body>
</html>