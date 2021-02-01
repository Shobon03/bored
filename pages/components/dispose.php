<?php

require "./session.php";

unset($_SESSION["dados"]);
session_destroy();

header("location:../.");

?>