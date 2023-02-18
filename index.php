<?php
include('conexao.php');

if (isset($_POST['login']) || isset($_POST['senha'])) {

  if (strlen($_POST[login]) == 0) {
    echo "Preencha seu login";
  } else if (strlen($_POST[senha]) == 0) {
    echo "Preencha sua Senha";
  } else {

    $login = $mysqli->real_escape_string($_POST[login]);
    $senha = $mysqli->real_escape_string($_POST[senha]);

    $sql_code = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if ($quantidade == 1) {

      $usuario = $sql_query->fetch_assoc();

      if (!isset($_SESSION)) {
        session_start();
      }

      $_SESSION['id'] = $usuario['id'];
      $_SESSION['nome'] = $usuario['nome'];

      header("Location: ");


    } else {
      echo "Falha ao logar! Login ou senha incorretos";
    }
  }
}
?>


<!DOCTYPE html>
<html lang="BR">

<head>
  <meta charset="UTF-8">

  <title>Login</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="login-box">
    <h2>Login</h2>
    <form method='POST' action='conexao.php'>
      <div class="user-box">
        <input type="text" name="" required="">
        <label>Login</label>
      </div>
      <div class="user-box">
        <input type="password" name="" required="">
        <label>Senha</label>
      </div>
      <a href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        ENTRAR
      </a>
  </div>
  </form>
</body>

</html>
