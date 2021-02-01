<?php include_once "./components/session.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bored | Inserir passatempo</title>
  <link rel="stylesheet" href="../styles/page-insert.css">
  <?php include_once "./components/imports.php"; ?>
</head>
<body>
  <?php include_once "./components/navbar.php"; ?>
  <div id="form">
    <h1>Cadastre um Passatempo</h1>
    <form action="./components/insert-hobby.php" method="POST" enctype="multipart/form-data">
      <fieldset>
        <legend>Dados básicos: </legend>
        <label for="title">Título</label>
        <input type="text" name="title" placeholder="Título do Passatempo">
      
        <br>
        <label for="hobby-image">Imagem</label>
        <input type="file" accept="image/*" name="hobby-image">

        <br>
        <label for="info">Informação (ex.: Como fazer, Plataformas, etc.)</label>
        <input type="info" name="info" placeholder="Informação do Passatempo">

        <br>
        <label for="difficulty">Dificuldade (1, 2 ou 3 [sendo fácil, moderada ou difícil, respectivamente])</label>
        <input type="number" min="1" max="3" name="difficulty" placeholder="Dificuldade do Passatempo">
      </fieldset>
      <fieldset class="instructions">
        <legend>Instruções: </legend>  
        <strong>Não apague as tags HTML, elas são de grande importância. Colque textos somente entre as tags do h1 ou do p.</strong>     
        <label>Parte 1</label>
        <textarea type="text" name="instructions-1">
<div class="gray">
<h1 class="step-title"></h1>
<p></p>
<p></p>
<p></p>
</div>  
        </textarea>
        <br>
        <label>Parte 2</label>
        <textarea type="text" name="instructions-2">
<div class="gray">
<h1 class="step-title"></h1>
<p></p>
<p></p>
<p></p>
</div> 
        </textarea>
        <br>
        <label>Parte 3</label>
        <textarea type="text" name="instructions-3">
<div class="gray">
<h1 class="step-title"></h1>
<p></p>
<p></p>
<p></p>
</div> 
        </textarea>
      </fieldset>
      <fieldset>
        <legend>Categorias à que pertence:</legend>
        <div>
          <div>
            <input type="checkbox" id="1" name="categories[]" value="1">
            <label for="1">Receitas</label>
          </div>
          <div>
            <input type="checkbox" id="2" name="categories[]" value="2">
            <label for="2">Lógica</label>
          </div>
          <div>
            <input type="checkbox" id="3" name="categories[]" value="3">
            <label for="3">Leitura</label>
          </div>
          <div>
            <input type="checkbox" id="4" name="categories[]" value="4">
            <label for="4">Exercícios</label>
          </div>
          <div>
            <input type="checkbox" id="5" name="categories[]" value="5">
            <label for="5">Arte</label>
          </div>
          <div>
            <input type="checkbox" id="6" name="categories[]" value="6">
            <label for="6">Família</label>
          </div>
        </div>
      </fieldset> 

        <button type="submit">Cadastrar!</button>
    </form>
  </div>
  <?php include_once "./components/bottom-navbar.php"; ?>
</body>
</html>