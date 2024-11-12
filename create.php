<?php

require_once 'Database.php';
require_once 'DBClientes.php';

  $database = new Database();
  $db = $database->getConnection();

  $clientes = new DBClientes($db);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];

    if ($clientes->create($nome, $cpf, $email)) {
      echo "Cliente cadastrado com sucesso!";
      header("Location: list.php");
    } else {
      echo "Erro ao adicionar cliente.";
    }
  }
?>