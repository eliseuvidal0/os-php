<?php
require_once '../Model/Conn.php';
class ClienteDAO {

    private $conn = "";
    
    public function __construct()
    {
        $this->conn = Conn::getInstance();
    }

    public function getCliente($cpfCnpj)
    {
        if (strlen($cpfCnpj) > 13) {
            $stmt = $this->conn->prepare("SELECT * FROM clientes WHERE cnpj = '{$cpfCnpj}'");
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM clientes WHERE cpf = '{$cpfCnpj}'");
        }
        
        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            echo "<script>alert('Erro ao consultar Cliente!');history.back()</script>";
        }
    }

    public function salvar($cliente)
    {
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

    public function consultar($campo)
    {
        $stmt = $this->conn->prepare('select c.id_cliente, c.nome, c.cpf, c.cnpj, c.telefone, c.celular, c.email, e.cep
                        from bancolocal.clientes as c
                        left join bancolocal.endereco as e on c.id_endereco = e.id_endereco');

                        //WHERE c.nome LIKE '.$campo);
        try {
            $stmt->execute();
            return $stmt->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();//.' - try linha 60 metodo consultar ClienteDAO';
        }   
    }

    public function buscarValor($id)
    {
        $stmt = $this->conn->prepare('select preco
                        from bancolocal.ordem where id_cliente = '.$id);

        try {
            $stmt->execute();
            return $stmt->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();//.' - try linha 74 metodo consultar ClienteDAO';
        } 
    }

    public function buscarClientePorId($id)
    {
        $stmt = $this->conn->prepare('select c.id_cliente, c.nome, c.cpf, c.cnpj, c.telefone, c.celular, c.email, e.cep, e.rua, e.bairro, e.cidade, e.uf
        from bancolocal.clientes as c
        left join bancolocal.endereco as e on c.id_endereco = e.id_endereco
        WHERE c.id_cliente = '.$id);

        try {
            $stmt->execute();
            return $stmt->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();//.' - try linha 60 metodo consultar ClienteDAO';
        }   
    }

    public function excluir($id)
    {
        $stmt = $this->conn->prepare("DELETE
                    FROM clientes WHERE id_cliente = :id");
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            return $stmt->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            //echo $e->getMessage().' - Não foi possível excluír a ordem';
            echo ' - Não foi possível excluír a ordem';
            die;
        } 
    }
}