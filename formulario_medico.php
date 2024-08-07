<?php
session_start();

// Verifica se o usuário em sessão é médico
if ($_SESSION['user_type'] != 'medico') {
  header("Location: index.html");
  exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inserção de Dados do Paciente</title>
  <link rel="stylesheet" href="styleformulario.css">
</head>

<body>
  <div class="tab-container">
    <div class="tabs">
      <button class="tab-button" onclick="openTab(event, 'dados-pessoais')">Dados do Pessoais</button>
      <button class="tab-button" onclick="openTab(event, 'informacoes-clinicas')">Informações Clínicas</button>
    </div>

    <div id="dados-pessoais" class="tab-content">
      <h2>Dados Pessoais do Paciente</h2>
      <form id="form-dados" action="salvar_paciente.php" method="POST">
        <input type="text" name="nome" placeholder="Nome Completo do Paciente" required><br>
        <input type="text" name="datadenascimento" placeholder="Data de Nascimento" required><br>
        <input type="text" name="idade" placeholder="Idade" required><br>
        <input type="text" name="sexo" placeholder="Sexo" required><br>



        <button type="button" onclick="openTab(event, 'informacoes-clinicas')">Próximo</button>
      </form>
    </div>

    <div id="informacoes-clinicas" class="tab-content">
      <h2>Informações Clínicas do Paciente</h2>
      <form id="form-clinico" action="salvar_paciente.php" method="POST">
        <input type="text" name="diagnostico" placeholder="Diagnóstico" required><br>
        <button type="submit">Salvar</button>
      </form>
    </div>
  </div>

  <script>
    function openTab(evt, tabName) {
      var i, tabcontent, tabbuttons;
      tabcontent = document.getElementsByClassName("tab-content");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tabbuttons = document.getElementsByClassName("tab-button");
      for (i = 0; i < tabbuttons.length; i++) {
        tabbuttons[i].className = tabbuttons[i].className.replace(" active", "");
      }
      document.getElementById(tabName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    document.getElementsByClassName('tab-button')[0].click();
  </script>
</body>

</html>