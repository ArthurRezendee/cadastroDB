<?php
require_once 'conexao.php';

$success_message = '';
$error_message = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $nickname = $_POST['nickname'];
        $password = $_POST['password'];

        if (empty($nickname) || empty($password)) {
            $error_message = "Digite seu usuário e senha.";
        } else {
            // Comando SQL para verificar se o usuário e a senha correspondem aos dados do banco
            $sql_verify = "SELECT * FROM cadastro WHERE nickname = '$nickname' AND senha = '$password'";
            $result = $conn->query($sql_verify);

            if ($result->num_rows > 0) {
                // Usuário encontrado com a senha correta, então podemos proceder com a exclusão
                $sql_delete = "DELETE FROM cadastro WHERE nickname = '$nickname' AND senha = '$password'";
                if ($conn->query($sql_delete) === TRUE) {
                  echo "<script type= 'text/javascript'>alert('Exclusão bem sucedida!');";
                  echo "javascript:window.location='../html/delete.html';</script>";
                } else {
                  echo "<script type= 'text/javascript'>alert('Erro ao deletar dados do usuário!');";
                  echo "javascript:window.location='../html/delete.html';</script>";
                }
            } else {
              echo "<script type= 'text/javascript'>alert('Usuário ou senha incorretos!');";
              echo "javascript:window.location='../html/delete.html';</script>";
            }
        }
    }
   
}

$conn->close();
?>
