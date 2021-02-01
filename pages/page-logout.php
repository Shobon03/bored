<?php
  require "./components/session.php";

  if ((!isset($_SESSION["dados"]) == true)) {

    unset($_SESSION["dados"]);
    header("location:page-unsuccessful.php");

  }

  header("location:./components/dispose.php?dados=" . $_SESSION["dados"]);
?>