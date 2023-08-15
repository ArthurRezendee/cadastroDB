
<?php
require_once 'conexao.php';

$sql = "SELECT id, nickname, email FROM cadastro";
$result = $conn->query($sql);




?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ProjetoDB</title>
  <link rel="icon" href="../images/sqlicon.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>

  <h1>
    Cadastro <a id="title">DB</a>
  </h1>

  <div id="menu" class="menu">
    <ul class="lista">
      <a href="../html/index.html" class="list">
        <li>
          <p1><span>Página</span> Inicial </p1>
        </li>
      </a>
      <a href="visualizar.php" class="list">
        <li>
          <p1><span>Visualizar</span> DB </p1>
        </li>
      </a>
      <a href="../html/sobre.html" class="list">
        <li>
          <p1><span>Sobre</span> o Projeto </p1>
        </li>
      </a>
      <a href="../html/delete.html" class="list">
        <li>
          <p1><span>Deletar</span> Cadastro </p1>
        </li>
      </a>
      <a href="../html/alterar.html" class="list">
        <li>
          <p1><span>Alterar</span> Registro</p1>
        </li>
      </a>

    </ul>
  </div>

  <div id="toggle" class="toggle-button">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
  </div>

 


 <div class="tabela">
        <table class="text-white table-bg">
            <thead>
                <tr>
                    <th scope="col" class='cell-head hash'>#</th>
                    <th scope="col" class='cell-head'>Username:</th>
                    <th scope="col" class='cell-head em'>Email:</th>
                </tr>
            </thead>
        <tbody>
            <?php
                while($user_data = mysqli_fetch_assoc($result))
                {
                    echo"<tr class='tab'>";
                    echo"<td class='cell-id'>" .$user_data['id']."</td>";
                    echo "<td class='cell-id'>" . $user_data['nickname'] . "</td>"; 
                    echo "<td class='cell-id'>" . $user_data['email'] . "</td>";    
                    echo "</tr>";
                }
            ?>
        </tbody>
        </table>
 </div>





  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>
  <script src="../js/script.js"></script>
</body>

</html>


