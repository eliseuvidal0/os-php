<?php
require_once 'mysql.php';
$id = "";


$consultar = consultar();
$ordens = carregar($id);


$evazio = empty($_GET);
if (!$evazio) {
    $acao = $_GET['acao'];
    $id = $_GET['id'];

    if ($acao == "excluir") {
        $ordens = excluir($id);
        echo "<script>window.location='consultar.php';alert('O.S excluida!');</script>";
    }
}
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>O.S</title>
    <style>
        div {
            position: absolute;
            top: 150px;
            left: 100px;
        }

        form {
            position: absolute;
            top: 50px;
            left: 500px;
        }
    </style>


</head>

<body>
    <form action="" method="" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" id="buscar" name="buscar" placeholder=" " aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
    <div class="container">

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Nº ORDEM</th>
                    <th>DATA</th>
                    <th>NOME</th>
                    <th>CPF</th>
                    <th>MARCA</th>
                    <th>PRECO</th>

                    <th>&nbsp;</th>
                    <th>&nbsp;</th>

                <tr>
                <?php
                foreach ($consultar as $ordens) {
                    $data = $ordens['data'];
                    $data = date('d/m/Y', strtotime($data));
                ?>
                    <tr class="bg-light">
                        <td><?= $ordens['id'] ?></td>
                        <td><?= $data ?></td>
                        <td><?= $ordens['cliente'] ?></td>
                        <td><?= $ordens['cpf'] ?></td>
                        <td><?= $ordens['marca'] ?></td>
                        <td><?= $ordens['preco'] ?></td>

                        <td><a class="btn btn-outline-warning" href="imprimir.php?acao=carregar&id=<?= $ordens['id'] ?>">Carregar</td>
                        <td><a class="btn btn-danger" href="consultar.php?acao=excluir&id=<?= $ordens['id'] ?>">Excluir</td>

                    </tr>
                    
                <?php
                }
                ?>
        </table>
        <button type="submit" class="btn btn-danger" onclick="window.location.href='http://localhost/ordem';">Voltar</button>
    </div>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</body>

</html>