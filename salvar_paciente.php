<?php
session_start();
if ($_SESSION['user_type'] != 'medico') {
  header("Location: index.html");
  exit();
}

include 'database.php';

$nome = $_POST['nome'];
$idade = $_POST['idade'];
$diagnostico = $_POST['diagnostico'];


$sql = "INSERT INTO pacientes (nome, idade, diagnostico) VALUES ('$nome','$idade','$diagnostico')";

if ($conn->query($sql) === TRUE) {
  echo "Novo registro criado com sucesso!";
} else {
  echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>