<?php

include_once "../../classes/Passatempo.php";
include_once "../../classes/Categoria.php";

if (isset($_POST["title"]) && isset($_POST["info"]) && isset($_FILES["hobby-image"]["name"]) && !empty($_FILES["hobby-image"]["name"]) && isset($_POST["instructions-1"]) &&
isset($_POST["instructions-2"]) && isset($_POST["instructions-3"]) && isset($_POST["categories"])&& isset($_POST["categories"])) {

  $nome = md5(uniqid(rand(), true));
  $extensao = pathinfo($_FILES["hobby-image"]["name"], PATHINFO_EXTENSION);
  $caminhoFoto = "./../images/hobby/" . $nome . "." . $extensao;
  move_uploaded_file($_FILES["hobby-image"]["tmp_name"], $caminhoFoto); 

  $titulo = $_POST["title"];
  $informacao = $_POST["info"];
  $dificuldade = $_POST["difficulty"];

  $instucoes1 = $_POST["instructions-1"];
  $instucoes2 = $_POST["instructions-2"];
  $instucoes3 = $_POST["instructions-3"];
  $instrucoes = $instucoes1 . $instucoes2 . $instucoes3;

  $categorias = $_POST["categories"];

  $resultado = Passatempo::cadastrarPassatempo($titulo, $instrucoes, $dificuldade, $categorias, $caminhoFoto, $informacao);
  if ($resultado == true) {

    header("location:../page-success.php");

  } else {

    header("location:../page-unsuccessful.php?erro=cadastro-passatempo");

  }

} else {

  header("location:../page-unsuccessful.php?erro=cadastro-passatempo");

}
  
?>  