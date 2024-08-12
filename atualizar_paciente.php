<?php
session_start(); // Inicia a sessão
// Conexão com o banco de dados
$servername = "localhost";
$dbusername = "root"; // Altere para o usuário do seu banco de dados
$dbpassword = ""; // Altere para a senha do seu banco de dados
$dbname = "prontuario";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Checa a conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

// Recupera os pacientes cadastrados
$sql = "SELECT id, nome FROM pacientes"; // Ajuste os campos conforme necessário
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Evolução de Prontuário e Administração de Medicamentos</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="img/favcon.png" type="image/x-icon"> <!-- Adicionando o favicon -->
</head>

<body>
  <div class="container">
    <h1>Evolução de Prontuário e Administração de Medicamentos</h1>
    <form action="atualiza_paciente.php" method="POST">
      <label for="nome">Paciente:</label>
      <select name="id_paciente" id="nome" required>
        <option value="" disabled selected>Selecione um paciente</option>
        <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
          }
        }
        ?>
      </select>

      <label for="data">Data:</label>
      <input type="date" name="data" id="data" required>

      <label for="horario">Horário:</label>
      <input type="time" name="horario" id="horario" required>

      <label for="evolucao">Evolução:</label>
      <textarea name="evolucao" id="evolucao" placeholder="Evolução" required></textarea>

      <label for="medicamentos">Medicamentos Administrados:</label>
      <textarea name="medicamentos" id="medicamentos" placeholder="Medicamentos Administrados" required></textarea>

      <label for="notas">Notas:</label>
      <textarea name="notas" id="notas" placeholder="Notas"></textarea>

      <button type="submit">Atualizar</button>
    </form>
  </div>
</body>

</html>

<?php
$conn->close(); // Fecha a conexão após o uso
?>