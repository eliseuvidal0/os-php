<?php 


function conexao()
{
    try {
        $conn = new PDO("mysql:host=localhost:3306;dbname=ordem", "root", "");
        return $conn;
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}
function salvar ($data, $cliente, $cpf, $cnpj, $cep, $rua, $bairro, $cidade, $uf, $telefone, $celular, $email, $aparelho, $marca, $serie, $preco, $defeito, $obs, $servico, $garantia)
{
    $conn = conexao();

    if (empty($id_pont)) {
        $stmt = $conn->prepare("INSERT INTO ordens (data, cliente, cpf, cnpj, cep, rua, bairro, cidade, uf, telefone, celular, email, aparelho, marca, serie, preco, defeito, obs, servico, garantia) 
                                values (:data, :cliente, :cpf, :cnpj, :cep, :rua, :bairro, :cidade, :uf, :telefone, :celular, :email, :aparelho, :marca, :serie, :preco, :defeito, :obs, :servico, :garantia)");
    }
    

    $stmt->bindParam(":data", $data);
    $stmt->bindParam(":cliente", $cliente);
    $stmt->bindParam(":cpf", $cpf);
    $stmt->bindParam(":cnpj", $cnpj);
    $stmt->bindParam(":cep", $cep);
    $stmt->bindParam(":rua", $rua);
    $stmt->bindParam(":bairro", $bairro);
    $stmt->bindParam(":cidade", $cidade);
    $stmt->bindParam(":uf", $uf);
    $stmt->bindParam(":telefone", $telefone);
    $stmt->bindParam(":celular", $celular);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":aparelho", $aparelho);
    $stmt->bindParam(":marca", $marca);
    $stmt->bindParam(":serie", $serie);
    $stmt->bindParam(":preco", $preco);
    $stmt->bindParam(":defeito", $defeito);
    $stmt->bindParam(":obs", $obs);
    $stmt->bindParam(":servico", $servico);
    $stmt->bindParam(":garantia", $garantia);

    if ($stmt->execute()) {
        return "<script>window.location='index.php';alert('O.S salva com sucesso!');</script>";
    } else {
        print_r($stmt->errorInfo());
        return "<script>window.location='ordem.php';alert('Não foi possível salvar a O.S!');</script>";
    }
}
function consultar()
{
    $conn = conexao();
    $stmt = $conn->prepare("SELECT * 
                FROM ordens ORDER BY id");
    if ($stmt->execute()) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        print_r($stmt->errorInfo());
        return "Não foi possível realizar a consulta.";
    }
}
function carregar($id)
{
    $conn = conexao();

    $stmt = $conn->prepare("SELECT *
                    FROM ordens WHERE id = :id");
    $stmt->bindParam(":id", $id);
    if ($stmt->execute()) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        print_r($stmt->errorInfo());
        return "Não foi possível realizar a consulta!";
    }
}

function excluir($id)
{
    $conn = conexao();
    $stmt = $conn->prepare("DELETE
                    FROM ordens WHERE id = :id");
    $stmt->bindParam(":id", $id);
    if ($stmt->execute()) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        print_r($stmt->errorInfo());
        return "Não foi possível excluir o produto!";
    }
}
function buscar($buscar)
{
    $conn = conexao();
    
    $stmt = $conn->prepare("SELECT *
                    FROM ordens WHERE cliente LIKE '%$buscar%' LIMIT 5");
    $stmt->bindParam(":cliente", $buscar);
    if ($stmt->execute()) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        print_r($stmt->errorInfo());
        return "Não foi possível realizar a consulta!";
    }
}
?>