<?php
session_start();
if ($_SESSION['user_type'] != 'enfermeiro') {
  header("Location: index.html");
  exit();
}

include 'database.php';

$nome = $_POST['nome'];
$evolucao = $_POST['evolucao'];
$medicamentos = $_POST['medicamentos'];

$sql = "UPDATE pacientes SET evolucao = '$evolucao', medicamentos = '$medicamentos' WHERE nome='$nome'";


if ($conn->query($sql) === TRUE) {
  echo "Registro atualizado com sucesso";
} else {
  echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>