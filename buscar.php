<?php
require_once 'mysql.php';

$ordens = "";
$id = "";

$ordens = carregar($id);

$evazio = empty($_GET);
if (!$evazio) {
    $acao = $_GET['acao'];
    $id = $_GET['id'];

    if ($acao == "excluir") {
        $ordens = excluir($id);
        echo "<script>window.location='buscar.php';alert('O.S excluida!');</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>O.S</title>

    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/buscar.css">
</head>

<body>
    <form>
        <input type="text" name="campo" id="campo">
    </form>

    <div id="resultado">
        <?php
        include('conn.php');
        
        $sql = $mysqli->prepare('SELECT * FROM ordens');
        $sql->execute();
        $sql->bind_result($id, $data, $cliente, $cpf, $cnpj, $cep, $rua, $bairro, $cidade, $uf, $telefone, $celular, $email, $aparelho, $marca, $serie, $preco, $defeito, $obs, $servico, $garantia);
    
        echo "
                    <table>

                        <thead>
                            <tr>
                                <td>Nº ORDEM</td>
                                <td>DATA</td>
                                <td>NOME</td>
                                <td>CPF</td>
                                <td>MARCA</td>
                                <td>PREÇO</td>

                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </thead>

                        <tbody>";
        while ($sql->fetch()) {

            $data = date('d/m/Y', strtotime($data));
            echo "
                        <tr>
                            <td>$id</td>
                            <td>$data</td>
                            <td>$cliente</td>
                            <td>$cpf</td>
                            <td>$marca</td>
                            <td>$preco</td>

                            
                            <td><a href='imprimir.php?acao=carregar&id=$id'>Carregar</button></td>
                            <td><a href='buscar.php?acao=excluir&id=$id' >Excluir</button></td>
                            
                        </tr>  ";
        }
        echo "</tbody>
                    </table>";
        ?>

    </div>

    <div>
        <a href="http://localhost:8080/index.php">Voltar</a>
    </div>
    

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="js/js.js"></script>
</body>

</html>