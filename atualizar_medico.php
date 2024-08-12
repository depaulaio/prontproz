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
  <title>Consulta Médica</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/script.js"></script>
  <link rel="icon" href="img/favcon.png" type="image/x-icon"> <!-- Adicionando o favicon -->
</head>

<body>
  <div class="container">
    <h1>Consulta Médica</h1>
    <form action="atualiza_medico.php" method="POST">
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

      <label for="sintomas">Sintomas:</label>
      <textarea name="sintomas" id="sintomas" placeholder="Sintomas" required></textarea>

      <label for="medicamentos">Medicamentos Prescritos:</label>
      <textarea name="medicamentos" id="medicamentos" placeholder="Medicamentos Prescritos" required></textarea>

      <label for="exames">Exames:</label>
      <textarea name="exames" id="exames" placeholder="Exames" required></textarea>

      <label for="diagnosticos">Diagnósticos:</label>
      <textarea name="diagnosticos" id="diagnosticos" placeholder="Diagnósticos" required></textarea>

      <label for="doenca">Doença:</label>
      <textarea name="doenca" id="doenca" placeholder="Doença" required></textarea>

      <label for="cid">CID:</label>
      <textarea name="cid" id="cid" placeholder="CID" required></textarea>

      <label for="notas">Notas:</label>
      <textarea name="notas" id="notas" placeholder="Notas"></textarea>
      <button type="submit">Atualizar</button>
      <button type="button" class="internar-btn" onclick="internarPaciente()">Internar</button>
    </form>
  </div>
</body>

</html>

<?php
$conn->close(); // Fecha a conexão após o uso
?>