<?php
session_start();
if ($_SESSION['user_type'] != 'enfermeiro') {
  header("Location: index.html");
  exit();
}

include 'database.php';

$sql = "SELECT * FROM pacientes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Evolução de Prontuário e Administração de Medicamentos</title>
</head>

<body>
  <h1>Evolução de Prontuário e Administração de Medicamentos</h1>
  <form action="atualizar_paciente.php" method="POST">
    <select name="nome" required>
      <option value="" disabled selected>Selecione um paciente</option>
      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
        }
      }
      ?>
    </select>
    <textarea name="evolucao" placeholder="Evolução" required></textarea>
    <textarea name="medicamentos" placeholder="Medicamentos Administrados" required></textarea>
    <button type="submit">Atualizar</button>
  </form>
</body>

</html>