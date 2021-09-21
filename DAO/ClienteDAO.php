<?php
require_once '../Model/Conn.php';
class ClienteDAO {

    private $conn = "";
    
    public function __construct() {
        $this->conn = Conn::getInstance();
    }

    public function getCliente($cpf){

        $stmt = $this->conn->prepare("SELECT * FROM clientes WHERE cpf = '{$cpf}'");

        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_OBJ);
        } else {
            print_r($stmt->errorInfo());
            return "Não foi possível realizar a consulta.";
        }
    }

    public function salvar($cliente){

        $stmt = $this->conn->prepare("INSERT INTO clientes (id_endereco, nome, cpf, cnpj, telefone, celular, email) 
                                    values (:id_endereco, :nome, :cpf, :cnpj, :telefone, :celular, :email)");

        $stmt->bindValue(":id_endereco", $cliente->getIdEndereco());
        $stmt->bindValue(":nome", $cliente->getNome());
        $stmt->bindValue(":cpf", $cliente->getCpf());
        $stmt->bindValue(":cnpj", $cliente->getCnpj());
        $stmt->bindValue(":telefone", $cliente->getTelefone());
        $stmt->bindValue(":celular", $cliente->getCelular());
        $stmt->bindValue(":email", $cliente->getEmail());

        if ($stmt->execute()) {
            return $this->getCliente($cliente->getCpf());
        } else {
            print_r($stmt->errorInfo());
            echo "<script>alert('Erro ao cadastrar Cliente!');history.back()</script>";
        }
    }
}