<?php

require_once("../Model/Ordem.php");
require_once("../Model/Cliente.php");
require_once("../Model/Endereco.php");
require_once("../DAO/ClienteDAO.php");
require_once("../DAO/EnderecoDAO.php");
require_once("../DAO/OrdemDAO.php");

class OrdemController {
    private $ordemDAO;

    public function __construct() {
        $this->ordemDAO = new OrdemDAO();
    }

    public function salvar() {
     
        if($_POST['data'] < date('d/m/Y')){
            //echo "<script>alert('Data não pode ser menor ou igual a hoje');history.back()</script>";
        }

        $ordem    = new Ordem();
        $cliente  = new Cliente();
        $endereco = new Endereco();
        $cli      = new ClienteDAO;
        $end      = new EnderecoDAO();

        $cpf  = preg_replace('/[^0-9]/', '', $_POST['cpf']);
        $cnpj = preg_replace('/[^0-9]/', '', $_POST['cnpj']);

        if($cpf) {
            $cli  = $cli->getCliente($cpf);
        }else {
            $cli  = $cli->getCliente($cnpj);
        }
        
        $end  = $end->getEndereco($_POST['cep']);
        
        if($end){
            $ordem->setIdEndereco($end->id_endereco);
            $endereco = $end;
        } else {
            $end      = new EnderecoDAO();
            $endereco->setCep($_POST['cep']);
            $endereco->setRua($_POST['endereco']);
            $endereco->setBairro($_POST['bairro']);
            $endereco->setCidade($_POST['cidade']);
            $endereco->setUf($_POST['uf']);
            $endereco = $end->salvar($endereco);
            $ordem->setIdEndereco($endereco->id_endereco);
        }
        
        if($cli){
            $ordem->setIdCliente($cli->id_cliente);
            $cliente = $cli;
        } else {
            $cli      = new ClienteDAO;
            $cliente->setNome($_POST['cliente']);
            $cliente->setEmail($_POST['email']);
            $cliente->setCpf($cpf);
            $cliente->setCnpj($cnpj);
            $cliente->setCelular($_POST['celular']);
            $cliente->setTelefone($_POST['telefone']);
            $cliente->setIdEndereco($endereco->id_endereco);
            $cliente = $cli->salvar($cliente);
            $ordem->setIdCliente($cliente->id_cliente);
        }

        $dataFormatada = implode("-", array_reverse(explode("/", trim($_POST['data']))));
        $preco = str_replace(',', '.', $_POST['preco']);

        $ordem->setData($dataFormatada);
        $ordem->setAparelho($_POST['aparelho']);
        $ordem->setMarca($_POST['marca']);
        $ordem->setSerie($_POST['serie']);
        $ordem->setPreco($preco);
        $ordem->setDefeito($_POST['defeito']);
        $ordem->setObs($_POST['obs']);
        $ordem->setServico($_POST['servico']);
        $ordem->setGarantia($_POST['garantia']);
        $ordem->setOpcao($_POST['opcao']);

        if($this->ordemDAO->salvar($ordem)) {
            echo "<script>alert('Ordem cadastrada com sucesso!');document.location='../index.php'</script>";
        }else{
            echo "<script>alert('Erro ao cadastrar Ordem!');history.back()</script>";
        }
        
    }

    public function editar() {

    }

    public function excluir($id) {
        return $this->ordemDAO->excluir($id);
    }

    public function getOrdem($id) {
        return $this->ordemDAO->getOrdem($id);
    }

    public function consultar($campo) {
        return $this->ordemDAO->consultar($campo);
    }
}

$ordemController = new OrdemController();

if(isset($_GET['action']) && $_GET['action'] == 'salvar') {
    $ordemController->salvar();
}

else if(isset($_GET['action']) && $_GET['action'] == 'editar') {
    $ordemController->editar();
}
