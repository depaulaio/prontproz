<?php
// Configurações de conexão com o banco de dados
$servername = "localhost";
$dbusername = "root"; // Altere para o usuário do seu banco de dados
$dbpassword = ""; // Altere para a senha do seu banco de dados
$dbname = "prontuario";

// Cria a conexão
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Checa a conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

// Recebe os dados do formulário
$user_type = $_POST['user_type'];
$username = $_POST['username'];
$password = $_POST['password'];

// Prepara e executa a consulta
$sql = "SELECT * FROM usuarios WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se o usuário existe
if ($result->num_rows === 1) {
  $user = $result->fetch_assoc();

  // Verifica a senha (assumindo que a senha está criptografada)
  if ($password === $user['password']) {
    // Determina o URL para redirecionamento
    if ($user['user_type'] === 'enfermeiro') {
      header("Location: salvar_paciente.html");
    } elseif ($user['user_type'] === 'medico') {
      header("Location: atualizar_medico.php");
    }
    exit(); // Para garantir que o script não continue executando após o redirecionamento
  } else {
    echo "Senha incorreta.";
  }
} else {
  echo "Usuário não encontrado.";
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>