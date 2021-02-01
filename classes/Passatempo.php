<?php

include_once "conexao.php";

class Passatempo {

  // CRIAR
  public static function cadastrarPassatempo($nome, $instrucoes, $dificuldade, $idsCategoria, $caminhoFoto, $informacao) {

    try {

      $conexao = BancoDados::getInstance() -> getConnection();
      $stmt = $conexao -> prepare("INSERT INTO passatempo(nome, instrucoes, dificuldade, caminho_foto, informacao) VALUES (?, ?, ?, ?, ?)");
      $stmt -> execute([$nome, $instrucoes, $dificuldade, $caminhoFoto, $informacao]);
      
      $idPassatempo = $conexao->lastInsertId();

      $stmt = $conexao -> prepare("INSERT INTO possui_passatempo_categoria(id_categoria, id_passatempo) VALUES (?, ?)");
      for ($i = 0; $i < count($idsCategoria); $i++) {

        $stmt -> execute([$idsCategoria[$i], $idPassatempo]);

      }      
      
      $linhasAlteradas = $stmt -> rowCount();

    } catch (Exception $e) {

      echo $e -> getMessage();
      exit;

    }

    $resultado = ($linhasAlteradas > 0) ? true : false;
    return $resultado;

  }
  

  // ATAULIZAR

  public static function atualizarPassatempo($nome, $instrucoes, $dificuldade, $informacao, $id) {

    try {

      $conexao = BancoDados::getInstance() -> getConnection();
      $stmt = $conexao -> prepare("UPDATE passatempo SET nome = ?, instrucoes = ?, dificuldade = ?, informacao = ? WHERE id = ?");
      $stmt -> execute([$nome, $instrucoes, $dificuldade, $informacao, $id]);
      $linhasAlteradas = $stmt -> rowCount();

    } catch(Exception $e) {

      echo $e -> getMessage();
      exit;

    }

    $resultado = ($linhasAlteradas > 0) ? true : false;
    return $resultado;

  }

  // LISTAR
  public static function listarTodos() {

    try {

      $conexao = BancoDados::getInstance() -> getConnection();
      $stmt = $conexao -> prepare("SELECT * FROM passatempo");
      $stmt -> execute([]);
      $busca = $stmt -> fetchAll();
      
    } catch(Exception $e) {

      echo $e -> getMessage();
      exit;

    }

    return $busca;

  }
  
  public static function listarPorCategoria($idCategoria) {

    try {

      $conexao = BancoDados::getInstance() -> getConnection();
      $stmt = $conexao -> prepare("SELECT pc.id_passatempo FROM possui_passatempo_categoria pc WHERE pc.id_categoria = ?");     
      $stmt -> execute([$idCategoria]);
      $busca = $stmt -> fetchAll();
      
    } catch(Exception $e) {

      echo $e -> getMessage();
      exit;

    }

    return $busca;

  }

  public static function listarPorNome($nomePassatempo) {
    
    try {

      $conexao = BancoDados::getInstance() -> getConnection();
      $stmt = $conexao -> prepare("SELECT * FROM passatempo WHERE nome LIKE ?");
      $stmt -> execute(["%" . $nomePassatempo . "%"]);
      $busca = $stmt -> fetchAll();
      
    } catch(Exception $e) {

      echo $e -> getMessage();
      exit;

    }

    return $busca;

  }

  public static function listarPorId($idPassatempo) {
    
    try {

      $conexao = BancoDados::getInstance() -> getConnection();
      $stmt = $conexao -> prepare("SELECT * FROM passatempo WHERE id = ?");
      $stmt -> execute([$idPassatempo]);
      $busca = $stmt -> fetchAll();
      
    } catch(Exception $e) {

      echo $e -> getMessage();
      exit;

    }

    return count($busca) == 1 ? $busca : false;

  }

  
  // DELETAR
  public static function deletarPassatempo($id) {

    try {

      $conexao = BancoDados::getInstance() -> getConnection();
      $stmt = $conexao -> prepare("DELETE FROM passatempo WHERE id = ?");
      $stmt -> execute([$id]);

      $stmt = $conexao -> prepare("DELETE FROM possui_passatempo_categoria WHERE id_passatempo = ?");
      $stmt -> execute([$id]);

      $linhasAlteradas = $stmt -> rowCount();
      
    } catch(Exception $e) {

      echo $e -> getMessage();
      exit;

    }

    $resultado = ($linhasAlteradas > 0) ? true : false;
    return $resultado;

  }

}

?>