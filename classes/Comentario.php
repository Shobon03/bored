<?php

include_once "conexao.php";

class Comentario {

  // INSERIR
  public static function cadastrarComentario($texto, $nomeUsuario, $idPassatempo) {

    try {

      $conexao = BancoDados::getInstance() -> getConnection();

      $stmt = $conexao -> prepare("INSERT INTO comentario(texto, nome_usuario) VALUES (?, ?)");
      $stmt -> execute([$texto, $nomeUsuario]);

      $idComentario = $conexao->lastInsertId();      
      $stmt = $conexao -> prepare("INSERT INTO possui_passatempo_comentario(id_comentario, id_passatempo) VALUES (?, ?)");
      $stmt -> execute([$idComentario, $idPassatempo]);

      $stmt = $conexao -> prepare("INSERT INTO escreve_usuario_comentario(data, hora, nome_usuario, id_comentario) VALUES (DATE(NOW()), TIME(NOW()), ?, ?)");
      $stmt -> execute([$nomeUsuario, $idComentario]);

      $linhasAlteradas = $stmt -> rowCount();     

    } catch (Exception $e) {

      echo $e -> getMessage();
      exit;

    }

    $resultado = ($linhasAlteradas > 0) ? true : false;
    return $resultado;

  }


  // LISTAR TODOS DE UM PASSATEMPO
  public static function listarComentarios($idPassatempo) {

    try {

      $conexao = BancoDados::getInstance() -> getConnection();
      $stmt = $conexao -> prepare("SELECT *    
                                   FROM (comentario c 
                                   INNER JOIN escreve_usuario_comentario ec ON c.id = ec.id_comentario 
                                   INNER JOIN usuario u ON ec.nome_usuario = u.nome_usuario) 
                                   INNER JOIN possui_passatempo_comentario pc ON c.id = pc.id_comentario 
                                   WHERE pc.id_passatempo = ?");
      $stmt -> execute([$idPassatempo]);
      $busca = $stmt -> fetchAll();

    } catch (Exception $e) {

      echo $e -> getMessage();
      exit;

    }

    return $busca;

  }

  public static function listarComentariosUsuario($nomeUsuario) {

    try {

      $conexao = BancoDados::getInstance() -> getConnection();
      $stmt = $conexao -> prepare("SELECT *    
                                   FROM (comentario c 
                                   INNER JOIN escreve_usuario_comentario ec ON c.id = ec.id_comentario
                                   INNER JOIN usuario u ON ec.nome_usuario = u.nome_usuario) 
                                   INNER JOIN possui_passatempo_comentario pc ON c.id = pc.id_comentario 
                                   WHERE ec.nome_usuario = ?");
      $stmt -> execute([$nomeUsuario]);
      $busca = $stmt -> fetchAll();

    } catch (Exception $e) {

      echo $e -> getMessage();
      exit;

    }

    return count($busca) > 0 ? $busca : false;

  }


  // DELETAR
  public static function deletarComentario($idComentario) {

    try {

      $conexao = BancoDados::getInstance() -> getConnection();   
      $stmt = $conexao -> prepare("DELETE FROM comentario WHERE id = ?");
      $stmt -> execute([$idComentario]);
      $stmt = $conexao -> prepare("DELETE FROM possui_passatempo_comentario WHERE id_comentario = ?");
      $stmt -> execute([$idComentario]);
      $stmt = $conexao -> prepare("DELETE FROM escreve_usuario_comentario WHERE id_comentario = ?");
      $stmt -> execute([$idComentario]);
      $busca = $stmt -> rowCount();

    } catch (Exception $e) {

      echo $e -> getMessage();
      exit;

    }

    return $busca;

  }


  // ALTERAR SE É LIBERADO
  public static function alterarLiberado($idComentario) {

    try {

      $conexao = BancoDados::getInstance() -> getConnection();
      $stmt = $conexao -> prepare("UPDATE comentario SET e_liberado = 1 WHERE id = ?");
      $stmt -> execute([$idComentario]);
      $linhasAlteradas = $stmt -> rowCount();     

    } catch (Exception $e) {

      echo $e -> getMessage();
      exit;

    }

    $resultado = ($linhasAlteradas > 0) ? true : false;
    return $resultado;

  }

}

?>