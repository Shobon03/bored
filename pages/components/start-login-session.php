<?php

require "./session.php";

$login = $_POST["username"];
$senha = $_POST["passwd"];

include_once "../../classes/Usuario.php";

$resultado = Usuario::verificarLogin($login, $senha);
if ($resultado != false) {

  $_SESSION["dados"] = $resultado[0];
  $resultado = Usuario::verificarAdmin($login);
  if ($resultado != 0) {

    $_SESSION["dados"]["admin"] = 1;

  } else {

    $_SESSION["dados"]["admin"] = 0;

  }

  header("location:../page-dashboard.php");

} else {

  unset($_SESSION["dados"]);
  header("location:../page-unsuccessful.php?erro=login");

}

?>