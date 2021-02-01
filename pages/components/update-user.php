<?php

require "./session.php";
include_once "../../classes/Usuario.php";

if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["date"])) {

  $nomeAntigo = $_SESSION["dados"]["nome_usuario"];
  $nomeUsuario = $_POST["username"];
  $email = $_POST["email"];
  $data = $_POST["date"];

  if (isset($_FILES["profile-picture"]["name"]) && !empty($_FILES["profile-picture"]["name"])) {

    $nomeFoto = md5(uniqid(rand(), true));
    $extensao = pathinfo($_FILES["profile-picture"]["name"], PATHINFO_EXTENSION);
    $caminhoFoto = "../../images/pfp/" . $nomeFoto . "." . $extensao;
    move_uploaded_file($_FILES["profile-picture"]["tmp_name"], $caminhoFoto); 

    $resultado = Usuario::atualizarUsuario($nomeUsuario, $nomeAntigo, $email, $nomeFoto, $data);
    if ($resultado > 0) {

      $_SESSION["dados"] = Usuario::verificarLogin($nomeUsuario, $_SESSION["dados"]["senha"])[0];
      header("location:../page-dashboard.php");

    } else {

      header("location:../page-unsuccessful.php?erro=atualizar-usuario");

    }

  } else {

    $resultado = Usuario::atualizarUsuario($nomeUsuario, $nomeAntigo, $email, "./../images/pfp/blank.png", $data);
    if ($resultado > 0) {

      $_SESSION["dados"] = Usuario::verificarLogin($nomeUsuario, $_SESSION["dados"]["senha"])[0];
      header("location:../page-dashboard.php");

    } else {

      header("location:../page-unsuccessful.php?erro=atualizar-usuario");

    } 


  }

}

?>