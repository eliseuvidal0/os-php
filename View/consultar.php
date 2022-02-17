<?php
require_once("../Controller/OrdemController.php");

$ordemController = new OrdemController;
$evazio = empty($_GET);
if (!$evazio) {
    $id = $_GET['id'];

    if ($_GET['acao'] == "excluir") {
        $ordemController->excluir($id);
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
    <div>
        <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/index.php">Voltar</a>
    </div>
    <div>
        <form method="POST" class="buscar">
            <input type="text" name="campo" id="campo">
        </form>

        <div id="resultado">
            <?php
            
            $campo="'%%'";
            $ordens = $ordemController->consultar($campo);
            include('res.php');
            echo "
                        <table class='os'>
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
                $total = number_format($ordem->preco, 2, ',', '.');
                echo "
                            <tr>
                                <td>$ordem->id_ordem</td>
                                <td>$data</td>
                                <td>$ordem->nome</td>
                                <td>$ordem->cpf</td>
                                <td>$ordem->marca</td>
                                <td>$total</td>
                                
                                <td><a href='carregar.php?acao=carregar&id=$id'>Carregar</button></td>
                                <td><a href='consultar.php?acao=excluir&id=$id' >Excluir</button></td>
                                
                            </tr>  ";
            }
            echo "</tbody>
                        </table>";
            ?>

        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="js/js.js"></script>
</body>

</html>