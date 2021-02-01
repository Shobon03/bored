<?php

include_once "conexao.php";

class Categoria {

  // LISTAR
  public static function listarTodasAsCategorias() {

    try {

      $conexao = BancoDados::getInstance() -> getConnection();
      $stmt = $conexao -> prepare("SELECT * FROM categoria");
      $stmt -> execute([]);
      $busca = $stmt -> fetchAll();
      
    } catch(Exception $e) {

      echo $e -> getMessage();
      exit;

    }

    return $busca;

  }

  public static function listarPorNome($nomeCategoria) {

    try {

      $conexao = BancoDados::getInstance() -> getConnection();
      $stmt = $conexao -> prepare("SELECT * FROM categoria WHERE nome LIKE ?");
      $stmt -> execute(["%" . $nomeCategoria . "%"]);
      $busca = $stmt -> fetchAll();
      
    } catch(Exception $e) {

      echo $e -> getMessage();
      exit;

    }

    return $busca;

  }

  public static function listarPorNomeExato($nomeCategoria) {

    try {

      $conexao = BancoDados::getInstance() -> getConnection();
      $stmt = $conexao -> prepare("SELECT id FROM categoria WHERE nome = ?");
      $stmt -> execute([$nomeCategoria]);
      $busca = $stmt -> fetchAll();
      
    } catch(Exception $e) {

      echo $e -> getMessage();
      exit;

    }

    return $busca;

  }

  public static function listarPorId($idCategoria) {

    try {

      $conexao = BancoDados::getInstance() -> getConnection();
      $stmt = $conexao -> prepare("SELECT * FROM categoria WHERE id = ?");
      $stmt -> execute([$idCategoria]);
      $busca = $stmt -> fetchAll();
      
    } catch(Exception $e) {

      echo $e -> getMessage();
      exit;

    }

    return $busca;

  }
  
  
  // ATUALIZAR
  public static function atualizarNomeCategoria($nome, $id) {

    try {

      $conexao = BancoDados::getInstance() -> getConnection();
      $stmt = $conexao -> prepare("UPDATE categoria SET nome = ? WHERE id = ?");
      $stmt -> execute([$nome, $id]);
      $linhasAlteradas = $stmt -> rowCount();

    } catch (Exception $e) {

      echo $e -> getMessage();
      exit;

    }

    $resultado = ($linhasAlteradas > 0) ? true : false;
    return $resultado;

  }

  public static function atualizarDescricaoCategoria($descricao, $id) {

    try {

      $conexao = BancoDados::getInstance() -> getConnection();
      $stmt = $conexao -> prepare("UPDATE categoria SET descricao = ? WHERE id = ?");
      $stmt -> execute([$descricao, $id]);
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