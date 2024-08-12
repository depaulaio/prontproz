<?php
session_start(); // Inicia a sessão

// Conexões de banco de dados
$servername = "localhost";
$dbusername = "root"; // Altere para o usuário do seu banco de dados
$dbpassword = ""; // Altere para a senha do seu banco de dados
$dbname = "prontuario";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Checa a conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

// Recebe os dados do formulário
$id_paciente = $_POST['id_paciente'];
$data = $_POST['data'];
$horario = $_POST['horario'];
$evolucao = $_POST['evolucao'];
$medicamentos = $_POST['medicamentos'];
$notas = $_POST['notas'];

// Prepara a consulta SQL para inserir os dados na tabela evolucoes_prontuario
$sql = "INSERT INTO  evolucoes_prontuario (id_paciente, data, horario, evolucao, medicamentos_administrados, notas) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("isssss", $id_paciente, $data, $horario, $evolucao, $medicamentos, $notas);

// Executa a consulta e verifica o resultado
if ($stmt->execute()) {
  $_SESSION['mensagem'] = "Atualização salva com sucesso!";
} else {
  $_SESSION['mensagem'] = "Erro ao salvar a atualização: " . $stmt->error;
}

// Redireciona de volta para o formulário
header("Location: atualizar_paciente.php");
exit();

// Fecha a conexão
$stmt->close();
$conn->close();
?>