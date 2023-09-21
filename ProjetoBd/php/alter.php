<?php

require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {





  // Recupera os dados do formulário
 $nickname = mysqli_real_escape_string($conn, $_POST['nickname_atual']);
  $senha = mysqli_real_escape_string($conn, $_POST['senha_atual']);  
  $newnick =mysqli_real_escape_string($conn, $_POST['novo_nickname']);
  $newemail = $_POST['novo_email'];
  $newpassword =mysqli_real_escape_string($conn, $_POST['nova_senha']);
  $connewpass = mysqli_real_escape_string($conn, $_POST['confirmar_senha']);

  if ($newpassword == $connewpass) {

    if (empty($nickname) || empty($senha)) {
      $error_message = "Digite seu usuário e senha.";
    } else {
      // Comando SQL para verificar se o usuário e a senha correspondem aos dados do banco
      $sql_verify = "SELECT * FROM cadastro WHERE nickname = '$nickname' AND senha = '$senha'";
      $result = $conn->query($sql_verify);

      if ($result->num_rows > 0) {
        // Usuário encontrado com a senha correta, então podemos proceder com a exclusão
        $sql_update = "UPDATE cadastro SET nickname = '$newnick', email = '$newemail', senha = '$newpassword' WHERE nickname = '$nickname' AND senha = '$senha'";
        $query_rum = mysqli_query($conn, $sql_update);
        if ($query_rum) {
          echo "<script type= 'text/javascript'>alert('Alteração bem sucedida!');";
      echo "javascript:window.location='../alterar.html';</script>";
        } else {
          echo "<script type= 'text/javascript'>alert('Erro ao alterar usuário!');";
      echo "javascript:window.location='../alterar.html';</script>";
        }
      } else {
        echo "<script type= 'text/javascript'>alert('Usuário ou senha incorretos!');";
      echo "javascript:window.location='../alterar.html';</script>";
      }
    }
  } else {
    echo "<script type= 'text/javascript'>alert('As senhas não correspondem!');";
      echo "javascript:window.location='../alterar.html';</script>";
  }


  // Fecha a conexão com o banco de dados
  $conn->close();
}
?>