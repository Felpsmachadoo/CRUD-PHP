<?php

require_once 'Database.php';
require_once 'DBClientes.php';

$database = new Database();
$db = $database->getConnection();

$clientes = new DBClientes($db);

$result = $clientes->read();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="list.css">
</head>
<body>
    <div class="header-title">
      <header>Lista de Clientes</header>
      <a href="index.html">Voltar ao Ínicio</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result): ?>
                <?php foreach ($result as $cliente): ?>
                    <tr>
                        <td><?php echo $cliente['id']; ?></td>
                        <td><?php echo $cliente['nome']; ?></td>
                        <td><?php echo $cliente['cpf']; ?></td>
                        <td><?php echo $cliente['email']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $cliente['id']; ?>">
                                <button>Editar</button>
                            </a>
                            <a href="delete.php?id=<?php echo $cliente['id']; ?>">
                                <button>Deletar</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Nenhum cliente encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
