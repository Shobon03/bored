<?php

include_once "conexao.php";

class Usuario {

  // CADASTRAR
  public static function cadastrarUsuario($nome, $senha, $email, $dataNascimento) {

    try {

      $conexao = BancoDados::getInstance() -> getConnection();      
      $stmt = $conexao -> prepare("INSERT INTO usuario(nome_usuario, senha, email, data_nascimento) VALUES (?, ?, ?, ?)");      
      
      $senha = password_hash($_POST["passwd"], PASSWORD_BCRYPT);
      
      $stmt -> execute([$nome, $senha, $email, $dataNascimento]);
      $linhasAlteradas = $stmt -> rowCount();

    } catch (Exception $e) {

      echo $e -> getMessage();
      exit;

    }

    $resultado = ($linhasAlteradas > 0) ? true : false;
    return $resultado;

  }   


  // DELETAR
  public static function deletarUsuario($nomeUsuario) {

    try {

      $conexao = BancoDados::getInstance() -> getConnection();
      $stmt = $conexao -> prepare("DELETE FROM usuario WHERE nome_usuario = ?");
      $stmt -> execute([$nomeUsuario]);
      $linhasAlteradas = $stmt -> rowCount();

    } catch (Exception $e) {

      echo $e -> getMessage();
      exit;

    }

    $resultado = ($linhasAlteradas > 0) ? true : false;
    return $resultado;

  }

  // ATUALIZAR
  public static function atualizarUsuario($nomeNovo, $nomeUsuario, $email, $fotoPerfil, $dataNascimento) {

    try {

      $conexao = BancoDados::getInstance() -> getConnection();
      $stmt = $conexao -> prepare("UPDATE usuario SET nome_usuario = ?, email = ?, foto_perfil = ?, data_nascimento = ? WHERE nome_usuario = ?");
      $stmt -> execute([$nomeNovo, $email, $fotoPerfil, $dataNascimento, $nomeUsuario]);
      $linhasAlteradas = $stmt -> rowCount();

    } catch (Exception $e) {

      echo $e -> getMessage();
      exit;

    }

      $resultado = ($linhasAlteradas > 0) ? true : false;
      return $resultado;

  }


  // VERIFICAR SE O USUARIO EXISTE
  public static function verificarLogin($login, $senha) {

    try {

      $conexao = BancoDados::getInstance() -> getConnection();
      $stmt = $conexao -> prepare("SELECT * FROM usuario WHERE nome_usuario = ? OR email = ?");
      $stmt -> execute([$login, $login]);
      $busca = $stmt -> fetchAll();

    } catch (Exception $e) {

      $e -> getMessage();
      exit;

    }

    if (count($busca) == 1) {

      $eIgual = password_verify($senha, $busca[0]["senha"]);

      return $eIgual ? $busca : false;

    }    

  }
  
  // VERIFICA SE O USUÁRIO É ADMIN  
  public static function verificarAdmin($login) {

    try {

      $conexao = BancoDados::getInstance() -> getConnection();
      $stmt = $conexao -> prepare("SELECT * FROM administrador WHERE nome_usuario = ?");
      $stmt -> execute([$login]);
      $busca = $stmt -> fetchAll();

    } catch (Exception $e) {

      $e -> getMessage();
      exit;

    }

    return count($busca) == 1 ? $busca : false;

  }

}

?>