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

