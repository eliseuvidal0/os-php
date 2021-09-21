<?php
require_once '../Model/Conn.php';
class EnderecoDAO {

    private $conn = "";
    
    public function __construct() {
        $this->conn = Conn::getInstance();
    }

    public function getEndereco($cep){

        $stmt = $this->conn->prepare("SELECT * FROM endereco WHERE cep = '{$cep}'");

        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_OBJ);
        } else {
            print_r($stmt->errorInfo());
            return "Não foi possível realizar a consulta.";
        }
    }

    public function salvar($endereco){
        $stmt = $this->conn->prepare("INSERT INTO endereco (cep, rua, bairro, cidade, uf) 
                                    values (:cep, :rua, :bairro, :cidade, :uf)");

        $stmt->bindValue(":cep", $endereco->getCep());
        $stmt->bindValue(":rua", $endereco->getRua());
        $stmt->bindValue(":bairro", $endereco->getBairro());
        $stmt->bindValue(":cidade", $endereco->getCidade());
        $stmt->bindValue(":uf", $endereco->getUf());

        if ($stmt->execute()) {
            return $this->getEndereco($endereco->getCep());
        } else {
            print_r($stmt->errorInfo());
            echo "<script>alert('Erro ao cadastrar Endereço!');history.back()</script>";
        }
    }
}