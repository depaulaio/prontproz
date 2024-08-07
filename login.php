<?php
session_start();
include 'database.php';

//Atenticação e redirecionamento

$username = $_POST['username'];
$password = $_POST['password'];
$user_type = $_POST['user_type'];

$sql = "SELECT * FROM usuarios WHERE username = '$username' AND '$password' AND user_type='$user_type'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $_SESSION['username'] = $username;
  $_SESSION['user_type'] = $user_type;
  if ($user_type == 'medico') {
    header("Location: formulario_medico.php");
  } else if ($user_type == 'enfermeiro') {
    header("Location: formulario_enfermeiro.php");
  }
} else {
  echo "Login falhou. Usuário ou senhas incorretos.";
}

$conn->close();
?>