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
$sintomas = $_POST['sintomas'];
$medicamentos = $_POST['medicamentos'];
$exames = $_POST['exames'];
$diagnosticos = $_POST['diagnosticos'];
$doenca = $_POST['doenca'];
$cid = $_POST['cid'];
$notas = $_POST['notas'];

// Prepara a consulta SQL para inserir os dados na tabela atualizacoes_medicas
$sql = "INSERT INTO atualizacoes_medicas (id_paciente, data, horario, sintomas, medicamentos_prescritos, exames, diagnosticos, doenca, cid, notas) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("isssssssss", $id_paciente, $data, $horario, $sintomas, $medicamentos, $exames, $diagnosticos, $doenca, $cid, $notas);

// Executa a consulta e verifica o resultado
if ($stmt->execute()) {
  $_SESSION['mensagem'] = "Atualização salva com sucesso!";
} else {
  $_SESSION['mensagem'] = "Erro ao salvar a atualização: " . $stmt->error;
}

// Redireciona de volta para o formulário
header("Location: atualizar_medico.php");
exit();

// Fecha a conexão
$stmt->close();
$conn->close();
?>