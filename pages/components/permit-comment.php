<?php

include_once "../../classes/Comentario.php";

$id = $_GET["id_comentario"];
$resultado = Comentario::alterarLiberado($id);
if ($resultado > 0) {

  header("location:../page-hobby.php?id=" . $_GET["id_passatempo"]);

} else {

  header("location:../page-unsuccessful.php?erro=liberar-comentario&id=" . $_GET["id_passatempo"]);

}


?>