<?php

require_once '../Model/Conn.php';

$conn = Conn::getInstance();

class OrdemDAO {

    private $conn = "";

    public function __construct()
    {
        $this->conn = Conn::getInstance();
    }

    public function salvar($ordem)
    {
        $stmt = $this->conn->prepare("INSERT INTO ordem (id_cliente, id_endereco, `data`, aparelho, marca, serie, preco, defeito, obs, servico, garantia, opcao) 
                                    values (:id_cliente, :id_endereco, :data, :aparelho, :marca, :serie, :preco, :defeito, :obs, :servico, :garantia, :opcao)");

        $stmt->bindValue(":id_cliente", $ordem->getIdCliente());
        $stmt->bindValue(":id_endereco", $ordem->getIdEndereco());
        $stmt->bindValue(":data", $ordem->getData());
        $stmt->bindValue(":aparelho", $ordem->getAparelho());
        $stmt->bindValue(":marca", $ordem->getMarca());
        $stmt->bindValue(":serie", $ordem->getSerie());
        $stmt->bindValue(":preco", $ordem->getPreco());
        $stmt->bindValue(":defeito", $ordem->getDefeito());
        $stmt->bindValue(":obs", $ordem->getObs());
        $stmt->bindValue(":servico", $ordem->getServico());
        $stmt->bindValue(":garantia", $ordem->getGarantia());
        $stmt->bindValue(":opcao", $ordem->getOpcao());

        try {
            $stmt->execute();
            echo "<script>alert('Ordem cadastrada com sucesso!');document.location='../index.php'</script>";
        } catch (PDOException $e) {
            print_r($stmt->errorInfo());
            echo "<script>alert('Erro ao cadastrar Ordem!');history.back()</script>";
        } 
    }

    public function consultar($campo)
    {
        #$stmt = $this->conn->prepare('select o.id_ordem, o.data, c.nome,c.cpf,o.marca,o.preco
        #                        from ordem as o
        #                        left join clientes as c on o.id_cliente = c.id_cliente');

        $stmt = $this->conn->prepare('select o.id_ordem, o.data, c.nome,c.cpf,o.marca,o.preco
                        from ordem as o
                        left join clientes as c on o.id_cliente = c.id_cliente
                        WHERE c.nome LIKE '.$campo);
        try {
            $stmt->execute();
            return $stmt->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage().' - try linha 58 metodo consultar OrdemDAO';
        }   
    }

    public function getOrdem($id)
    {
        $stmt = $this->conn->prepare('select id_ordem,data,aparelho,marca,serie,preco,defeito,obs,servico,garantia,nome,cpf,cnpj,telefone,celular,email,cep,rua,bairro,cidade,uf,opcao
                                    from ordem as o
                                    left join clientes as c on o.id_cliente = c.id_cliente
                                    left join endereco as e on o.id_endereco = c.id_endereco
                                    where id_ordem = '.$id.' limit 1');
        try {
            $stmt->execute();
            return $stmt->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage().' - Erro ao buscar Ordem!';
            die;
        } 
    }

    public function excluir($id)
    {
        $stmt = $this->conn->prepare("DELETE
                    FROM ordem WHERE id_ordem = :id");
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