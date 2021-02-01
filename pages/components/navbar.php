<div id="navbar">
  <div class="title">
    <a href="../index.php">Bored</a>
  </div>
  <div class="search" onScroll=()>
    <form action="page-search.php" method="POST">
      <input type="text" name="search-word" placeholder="Pesquise por uma categoria ou um passatempo" required>
      <button action="submit"><i class="fas fa-search"></i></button>
    </form>
  </div>
  <div class="choices">
    <ul>
      <li><a href="./page-categories.php" class="categories">Categorias</a></li>
      <li><a href="./page-hobbies.php" class="all">Passatempos</a></li>
      <li>
        <?php
          if (isset($_SESSION["dados"])) {

            echo '<a href="./page-dashboard.php" class="user">Olá, ' . $_SESSION["dados"]["nome_usuario"] . '</a>';

          } else {

            echo '<a href="./page-sign-up.php" class="user">Cadastre-se!</a>';

          }      
        ?>
      </li>
    </ul>
  </div>
</div>