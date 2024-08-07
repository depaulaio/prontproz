<?php
//Parâmetrros para conexão com o Banco de Dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saude";

//Cria conexão com o Banco de Dados
$conn = new mysqli($servername, $username, $password, $dbname);

//Verica conexão com o Banco de Dados
if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
  //  echo 'Erro na conexão com o banco de dados' . $conn;

}
?>