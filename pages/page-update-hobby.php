<?php include_once "./components/session.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bored | Atualize o passatempo</title>
  <link rel="stylesheet" href="../styles/page-update-hobby.css">
  <?php include_once "./components/imports.php"; ?>
</head>
<body>
  <?php include_once "./components/navbar.php"; ?>
  <div id="update-hobby">
    <?php

    include_once "../classes/Passatempo.php";

    $resultado = Passatempo::listarPorId($_GET["id"]);

    if ($resultado != false) {

      $passatempo = $resultado[0];
      
      echo '
      <h1>Atualize o Passatempo ' . $passatempo["nome"] . '</h1>
        <form action="./components/update-hobby.php?id='. $_GET["id"] .'" method="POST">
          <fieldset>
            <legend>Dados básicos: </legend>
            <label for="title">Título</label>
            <input type="text" name="title" placeholder="Título do Passatempo" value="' . $passatempo["nome"] . '">

            <br>
            <label for="info">Informação (ex.: Como fazer, Plataformas, etc.)</label>
            <input type="info" name="info" placeholder="Informação do Passatempo" value="' . $passatempo["informacao"] . '">

            <br>
            <label for="difficulty">Dificuldade (1, 2 ou 3 [sendo fácil, moderada ou difícil, respectivamente])</label>
            <input type="number" min="1" max="3" name="difficulty" placeholder="Dificuldade do Passatempo" value="' . $passatempo["dificuldade"] . '">
          </fieldset>
          <fieldset class="instructions">
            <legend>Instruções: </legend>  
            <strong>Não apague as tags HTML, elas são de grande importância. Colque textos somente entre as tags do h1 ou do p.</strong>     
            <label>Conteúdo completo:</label>
            <textarea type="text" name="instructions">'. $passatempo["instrucoes"] . '</textarea>
          </fieldset>
            <button type="submit">Atualizar</button>
        </form>';

    }   
    echo '<a href="./page-update-user.php">Deletar Passatempo</a>';
  ?>
  </div>
  <?php include_once "./components/bottom-navbar.php"; ?>
</body>
</html>