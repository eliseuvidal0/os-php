<?php
require_once("../Controller/ClienteController.php");

$clienteController = new ClienteController;
$evazio = empty($_GET);
if (!$evazio) {
    $id = $_GET['id'];
    if ($_GET['acao'] == "excluir") {
        echo "<script>
                var result = confirm('Essa ação excluirá todas ordens vinculadas a este cliente. Deseja continuar?');
            
                if (!result) {
                    window.location='consultarClientes.php';
                }
            </script>";
        var_dump($_GET['acao']);
        die;
        $clienteController->excluir($id);
        echo "<script>window.location='consultarClientes.php';alert('Cliente excluído!');</script>";
    }
    var_dump($_GET);
    die;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>O.S</title>

    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="../css/buscar.css">
</head>

<body>
    <div>
        <a href="http://localhost:8080/index.php">Voltar</a>
    </div>
    <!--
    <form method="POST">
        <input type="text" name="campo" id="campo">
    </form>-->

    <div id="resultado">
        <?php
        
        $campo="'%%'";
        $clientes = $clienteController->consultar($campo);
        //include('res.php');
        echo "
                    <table>

                        <thead>
                            <tr>
                                <td>Nº CLIENTE</td>
                                <td>NOME</td>
                                <td>CPF</td>
                                <td>CNPJ</td>
                                <td>TELEFONE</td>
                                <td>CELULAR</td>
                                <td>EMAIL</td>
                                <td>CEP</td>
                                <td>TOTAL GASTO</td>

                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </thead>

                        <tbody>";
        foreach ($clientes as $cli) {

            $id = $cli->id_cliente;
            $total = $clienteController->buscarValor($id);

            echo "
                        <tr>
                            <td>$cli->id_cliente</td>
                            <td>$cli->nome</td>
                            <td>$cli->cpf</td>
                            <td>$cli->cnpj</td>
                            <td>$cli->telefone</td>
                            <td>$cli->celular</td>
                            <td>$cli->email</td>
                            <td>$cli->cep</td>
                            <td>$total</td>
                            
                            <td><a href='carregarCliente.php?acao=carregar&id=$id' onclick='return confirm('Essa ação excluirá todas ordens vinculadas a este cliente. Deseja continuar?')'>Carregar</button></td>
                            <td><a href='consultarClientes.php?acao=excluir&id=$id' >Excluir</button></td>
                            
                        </tr>  ";
        }
        echo "</tbody>
                    </table>";
        ?>

    </div>
    

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="js/js.js"></script>
</body>

</html>