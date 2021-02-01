<?php

require "./session.php";
include_once "../../classes/Comentario.php";

if (isset($_POST["comment"]) && isset($_SESSION["dados"]) && isset($_GET["id"])) {

  $conteudo = $_POST["comment"];
  $usuario = $_SESSION["dados"]["nome_usuario"];
  $idPassatempo = $_GET["id"];
  $resultado = Comentario::cadastrarComentario($conteudo, $usuario, $idPassatempo);

  if ($resultado > 0) {

    header("location:../page-hobby.php?id=" . $idPassatempo);

  } else {

    header("location:../page-unsuccessful.php?erro=cadastro-comentario&id=" . $_GET["id"]);

  }

} else {

  header("location:../page-unsuccessful.php?erro=cadastro-comentario&id=" . $_GET["id"]);

}
 

?>