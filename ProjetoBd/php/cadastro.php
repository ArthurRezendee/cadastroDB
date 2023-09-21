<?php

require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
  

    // Recupera os dados do formulário
    $nickname = mysqli_real_escape_string($conn, $_POST['nickname']);
    $senha = mysqli_real_escape_string($conn, $_POST['password']);
    $email = $_POST['email'];
    $consenha = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    if($senha == $consenha){
      
      $sqlUsuario = "SELECT * FROM cadastro WHERE nickname = ?";
      $stmt = mysqli_prepare($conn, $sqlUsuario);
      mysqli_stmt_bind_param($stmt, "s", $nickname);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);

      if (mysqli_stmt_num_rows($stmt) > 0) {
        echo "<script type= 'text/javascript'>alert('Usuário já existente!');";
          echo "javascript:window.location='../html/index.html';</script>";
      } else {
    // Insere os dados no banco de dados
        $sql = "INSERT INTO cadastro (nickname, email, senha) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $nickname, $email, $senha);
        if (mysqli_stmt_execute($stmt)) {
          echo "<script type= 'text/javascript'>alert('Cadastro realizado com sucesso!');";
          echo "javascript:window.location='../html/index.html';</script>";
        } else {
          echo "<script type= 'text/javascript'>alert('Erro ao cadastrar usuário!');";
          echo "javascript:window.location='../html/index.html';</script>";
        }
      }
    }
    else{
      echo "<script type= 'text/javascript'>alert('As senhas não correspondem!');";
      echo "javascript:window.location='../html/index.html';</script>";
    }
    // Fecha a conexão com o banco de dados
    $conn->close();
  }
?>