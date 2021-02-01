<?php include_once "pages/components/session.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bored | Descubra hobbies e passatempos</title>
  <link rel="stylesheet" href="styles/page-boot.css">
  <link rel="stylesheet" href="styles/nav-bar.css">
  <link rel="stylesheet" href="styles/global.css">
  <link rel="stylesheet" href="styles/footer.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>
<body>
  <div id="navbar">
    <div class="title">
      <a href="">Bored</a>
    </div>
    <div class="search" onScroll=()>
      <form action="page-search.php" method="POST">
        <input type="text" name="search-word" placeholder="Pesquise por uma categoria ou um passatempo" required>
        <button action="submit"><i class="fas fa-search"></i></button>
      </form>
    </div>
    <div class="choices">
      <ul>
        <li><a href="pages/page-categories.php" class="categories">Categorias</a></li>
        <li><a href="pages/page-hobbies.php" class="all">Passatempos</a></li>
        <li>
          <?php
            if (isset($_SESSION["dados"])) {

              echo '<a href="pages/page-dashboard.php" class="user">Olá, ' . $_SESSION["dados"]["nome_usuario"] . '</a>';

            } else {

              echo '<a href="pages/page-sign-up.php" class="user">Cadastre-se!</a>';

            }      
          ?>
        </li>
      </ul>
    </div>
  </div>
  <div>    
    <div id="info">
      <img src="images/people.png" alt="duas pessoas tentando montar um quebra-cabeças">      
      <div>
        <p>Bem vindo ao <strong>BORED!</strong></p>
        <p>Um site dedicado a passatempos que você poderá fazer, mesmo de sua casa.</p>
      </div>
    </div>
    <div id="message">
      <div class="texts">
        <h1>Entediado nessa pandemia?</h1>
        <p>Venha e descubra alguns dos melhores passatempos que você poderá fazer (e até mesmo descobrir alguns hobbies)!</p>
      </div>
    </div>
    <div id="hobbies">
      <h1>Veja alguns temas de passatempos:</h1>
      <div id="hobbie">
        <div class="hobbie-image"><img src="images/Arte.jpg" alt="pequena aquarela com várias cores"></div>
        <div class="hobbie-texts">
          <a>Pintura e desenho</a>
          <p>Confira alguns métodos e treinos para você aprender a desenhar ou se aperfeiçoar</p>
        </div>        
      </div>
      <div id="hobbie">
        <div class="hobbie-texts">
          <a>Atividades em família</a>
          <p>Aprenda diferentes maneiras que você poderá ter um tempo satisfatório com sua família</p>
        </div>        
        <div class="hobbie-image"><img src="images/Stop-Passatempo.jpeg" alt="pessoas escrevendo em papéis"></div>
      </div>
      <div id="hobbie">
        <div class="hobbie-image"><img src="images/VideoGame.png" alt="duas pessoas segundo um controle de video-game em frente a uma tv"></div>
        <div class="hobbie-texts">
          <a>Vídeo-games</a>
          <p>Veja uma lista de jogos que mais estão em alta para jogar sozinho ou com seus amigos</p>
        </div>        
      </div>
      <h1>E muito mais!</h1>
    </div>
    <div id="buttons">
      <a href="pages/page-hobbies.php">Veja os Passatempos</a>
      <a href="pages/page-categories.php">Veja as Categorias</a>
    </div>
    <div id="about">
    <h1>BORED</h1>
    <div id="TOS">
      <a href="pages/page-tos.php">Termos e Políticas</a>
    </div>
    <div id="about-us">
      <a href="pages/page-who.php">Quem somos</a>
    </div>
    <p>© 2020, 2021 Isabelle, Letícia, Matheus e Pedro. <br>Todos os direitos não reservados :P</p>
  </div>
  </div>
</body>
</html>