<?php

require_once 'Database.php';
require_once 'DBClientes.php';

$database = new Database();
$db = $database->getConnection();

$clientes = new DBClientes($db);

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $cliente = $clientes->recoveryById($id);

  if ($cliente) {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $nome = $_POST['nome'];
      $cpf = $_POST['cpf'];
      $email = $_POST['email'];

      if ($clientes->update($id, $nome, $cpf, $email)) {
        echo "Dados atualizado com sucesso!";
        header("Location: list.php");
      } else {
        echo "Erro ao atualizar cadastro.";
      }
    }
  }
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <header>Editar cadastro</header>
    <form action="" method="POST" class="form">
      <div class="input-box">
        <label for="name">Nome: </label>
        <input type="text" id="nome" name="nome" value="<?php echo $cliente['nome']; ?>" required>
      </div>

      <div class="input-box">
        <label for="cpf">CPF: </label>
        <input type="text" id="cpf" name="cpf" value="<?php echo $cliente['cpf']; ?>" required>
      </div>

      <div class="input-box">  
        <label for="email">E-mail: </label>
        <input type="email" id="email" name="email" value="<?php echo $cliente['email']; ?>" required>
      </div>

      <button type="submit">Atualizar Cadastro</button>

      <div class="link">
      <a href="index.html" >Voltar ao Ínicio</a>
      </div>
    </form>
  </div>