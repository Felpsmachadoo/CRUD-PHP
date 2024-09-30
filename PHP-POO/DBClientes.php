<?php

class DBClientes {

  private $conn;
  private $table_name = 'clientes';

  public function __construct($db) {
    $this->conn = $db;
  }

  public function create($nome, $cpf, $email) {
    $query = "INSERT INTO " . $this->table_name . " (nome, cpf, email) VALUES (:nome, :cpf, :email)";
    
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":cpf", $cpf);
    $stmt->bindParam(":email", $email);

    if ($stmt->execute()) {
        return true;
    }

    return false;
}

  public function read() {
    $query = "SELECT * FROM " . $this->table_name;

    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function recoveryById($id) {
    $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
  
    return $stmt->fetch(PDO::FETCH_ASSOC);
}



  public function update($id, $nome, $cpf, $email) {
    $query = "UPDATE " . $this->table_name . " SET nome = :nome, cpf = :cpf, email = :email WHERE id = :id";
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":cpf", $cpf);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":id", $id);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  public function delete($id) {
    $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $id);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }
}
?>