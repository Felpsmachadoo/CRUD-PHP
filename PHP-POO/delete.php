<?php

require_once "Database.php";
require_once "DBClientes.php";

$database = new Database();
$db = $database->getConnection();

$cliente = new DBClientes($db);

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  if ($cliente->delete($id)) {
    echo "Cliente deletado com sucesso!";
  } else {
    echo "Erro ao deletar cliente.";
  }

  header("Location: list.php");
}
?>