<?php
require_once("../DAO/OrdemDAO.php");

$ordemDAO = new OrdemDAO;
$evazio = empty($_GET);
if (!$evazio) {
    $id = $_GET['id'];

    if ($_GET['acao'] == "excluir") {
        $ordemDAO->excluir($id);
        echo "<script>window.location='consultar.php';alert('O.S excluida!');</script>";
    }
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
    <form method="POST">
        <input type="text" name="campo" id="campo">
    </form>

    <div id="resultado">
        <?php
        
        $campo="'%%'";
        $ordens = $ordemDAO->consultar($campo);
        include('res.php');
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
        foreach ($ordens as $ordem) {

            $id = $ordem->id_ordem;
            $data = date('d/m/Y', strtotime($ordem->data));
            echo "
                        <tr>
                            <td>$ordem->id_ordem</td>
                            <td>$data</td>
                            <td>$ordem->nome</td>
                            <td>$ordem->cpf</td>
                            <td>$ordem->marca</td>
                            <td>$ordem->preco</td>
                            
                            <td><a href='carregar.php?acao=carregar&id=$id'>Carregar</button></td>
                            <td><a href='consultar.php?acao=excluir&id=$id' >Excluir</button></td>
                            
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