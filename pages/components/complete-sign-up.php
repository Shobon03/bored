<?php

include_once "../../classes/Usuario.php";

$email = $_POST["e-mail"];
$nome = $_POST["username"];
$senha = $_POST["passwd"];
$confimacaoSenha = $_POST["passwd-confirm"];


if ($senha === $confimacaoSenha) {

  $resultado = Usuario::cadastrarUsuario($nome, $senha, $email, '0000-00-00');
  if ($resultado > 0) {

    header("location:../page-login.php");

  }

} else {

  header("location:../page-unsuccessful.php?erro=cadastro-usuario");

}

?>