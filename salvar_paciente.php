<?php
// Configurações de conexão com o banco de dados
$servername = "localhost";
$dbusername = "root"; // Substitua pelo usuário do seu banco de dados
$dbpassword = ""; // Substitua pela senha do seu banco de dados
$dbname = "prontuario"; // Nome do banco de dados

// Cria a conexão
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Checa a conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

echo '<pre>';
print_r($_POST);
echo '</pre>';

// Recebe os dados do formulário
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$data_de_nascimento = $_POST['datadenascimento'];
$sexo = $_POST['sexo'];
$nacionalidade = $_POST['nacionalidade'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$historico = $_POST['historico'];
$contato_emergencia = $_POST['contato-emergencia'];
$tipo_sanguineo = $_POST['tipo-sanguineo'];
$temperatura = $_POST['temperatura'];
$pressao = $_POST['pressao'];
$observacoes = $_POST['observacoes'];

// Prepara a declaração SQL para inserir os dados na tabela 'pacientes'
$sql = "INSERT INTO pacientes (nome, cpf, data_nascimento, sexo, nacionalidade, email, telefone, endereco, historico_medico, contato_emergencia, tipo_sanguineo, temperatura, pressao, observacoes) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssssss", $nome, $cpf, $data_de_nascimento, $sexo, $nacionalidade, $email, $telefone, $endereco, $historico, $contato_emergencia, $tipo_sanguineo, $temperatura, $pressao, $observacoes);

// Executa a declaração
if ($stmt->execute()) {
  header("Location: salvar_paciente.html?success=true");
  exit(); // Para garantir que o script não continue executando após o redirecionamento
  //echo "Dados do paciente salvos com sucesso!";
} else {
  header("Location: salvar_paciente.html?success=false");
  exit();
  //echo "Erro: " . $stmt->error;
}

// Fecha a conexão
$stmt->close();
$conn->close();

?>