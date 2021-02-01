<?php

require "./session.php";
include_once "../../classes/Passatempo.php";

if (isset($_POST["title"]) && isset($_POST["info"]) && 
isset($_POST["instructions"]) && isset($_POST["difficulty"]) && isset($_GET["id"])) {

  $nome = $_POST["title"];
  $instrucoes = $_POST["instructions"];
  $dificuldade = $_POST["difficulty"];
  $informacao = $_POST["info"];
  $id = $_GET["id"];

  $resultado = Passatempo::atualizarPassatempo($nome, $instrucoes, $dificuldade, $informacao, $id);
  if ($resultado > 0) {

    header("location:../page-hobby.php?id=" . $id);

  } else {

    header("location:../page-unsuccessful.php?id=" . $id . "&erro=atualizar-passatempo");

  }

} else {

  header("location:../page-unsuccessful.php?id=" . $id . "&erro=atualizar-passatempo");

}

?>