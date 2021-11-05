<?php

require_once("../DAO/ClienteDAO.php");

class ClienteController {

    private $clienteDAO;

    public function __construct()
    {
        $this->clienteDAO = new ClienteDAO;
    }

    public function editar($id)
    {
        echo 'editando...';
        echo '<hr>';
        echo $_POST['cliente'].'<br>';
        echo $_POST['cpf'].'<br>';
        echo $_POST['cnpj'].'<br>';
        echo $_POST['cep'].'<br>';
        echo $_POST['endereco'].'<br>';
        echo $_POST['bairro'].'<br>';
        echo $_POST['cidade'].'<br>';
        echo $_POST['uf'].'<br>';
        echo $_POST['telefone'].'<br>';
        echo $_POST['celular'].'<br>';
        echo $_POST['email'].'<br>';

        $clienteAntigo = $this->buscarClientePorId($id);
        var_dump($clienteAntigo);
    }

    public function excluir($id)
    {
        return $this->clienteDAO->excluir($id);
    }

    public function buscarClientePorId($id)
    {
        return $this->clienteDAO->buscarClientePorId($id);
    }

    public function consultar($campo)
    {
        return $this->clienteDAO->consultar($campo);
    }

    public function buscarValor($id)
    {
        $resultado = $this->clienteDAO->buscarValor($id);

        $total = 0;
        
        foreach($resultado as $r){
            $total += $r->preco;
        }

        return number_format($total, 2, ',', '.');
    }
}

$clienteController = new ClienteController();

if(isset($_GET['action']) && $_GET['action'] == 'salvar') {
    //$clienteController->salvar();
}

else if(isset($_GET['action']) && $_GET['action'] == 'editar') {
    $id = $_POST['id_cliente'];
    $clienteController->editar($id);
}

else if(isset($_GET['action']) && $_GET['action'] == 'excluir') {
    $id = $_GET["id"];
    $clienteController->excluir($id);
}