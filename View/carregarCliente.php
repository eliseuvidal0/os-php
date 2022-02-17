<?php

require_once("../Controller/ClienteController.php");

$evazio = empty($_GET);
if (!$evazio) {
    $acao = $_GET['acao'];
    $id = $_GET['id'];

    if ($acao == "carregar") {
        $ClienteController = new ClienteController;
        $cliente = $ClienteController->buscarClientePorId($id);
    }
}

?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>O.S</title>

</head>

<body>
    <header>
        <?php include 'head.php'; ?>
    </header>
    <center>
        <h1>Dados do Cliente</h1>
        <h5>TSA (41)3026-1991</h5>
        <br><br />
    </center>
    <br>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <form form action="../Controller/ClienteController.php?action=editar" method="POST">
        <div class="container">
            <div class="form-row">
                <input type="hidden" name="id_cliente" value="<?= $cliente[0]->id_cliente ?>"/>
                <div class="col-md-4">
                    <label>Cliente:</label>
                    <input type="text" class="form-control" name="cliente" value="<?= $cliente[0]->nome ?>">
                </div>
                <div class="col-md-4">
                    <label>CPF:</label>
                    <input type="text" class="form-control cpf" name="cpf" value="<?= $cliente[0]->cpf ?>" placeholder=" "readonly>
                </div>
                <div class="col-md-4">
                    <label>CNPJ:</label>
                    <input type="text" class="form-control cnpj" name="cnpj" value="<?= $cliente[0]->cnpj ?>" placeholder=" "readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <label for="cep">CEP:</label>
                    <input id="cep" type="text" class="form-control cep" name="cep" value="<?= $cliente[0]->cep ?>">
                </div>
                <div class="col-md-4">
                    <label for="endereco">Endereço:</label>
                    <input id="endereco" type="text" class="form-control endereco" name="endereco" value="<?= $cliente[0]->rua ?>">
                </div>
                <div class="col-md-4">
                    <label for="bairro">Bairro:</label>
                    <input id="bairro" type="text" class="form-control bairro" name="bairro" value="<?= $cliente[0]->bairro ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <label for="cidade">Cidade:</label>
                    <input id="cidade" type="text" class="form-control cidade" name="cidade" value="<?= $cliente[0]->cidade ?>">
                </div>
                <div class="col-md-4">
                    <label for="uf">Estado:</label>
                    <input type="text" id="uf" class="form-control uf" name="uf" value="<?= $cliente[0]->uf ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <label>Telefone:</label>
                    <input type="text" class="form-control telefone" name="telefone" value="<?= $cliente[0]->telefone ?>">
                </div>
                <div class="col-md-4">
                    <label>Celular:</label>
                    <input type="text" class="form-control celular" name="celular" value="<?= $cliente[0]->celular ?>">
                </div>
                <div class="col-md-4">
                    <label>E-mail:</label>
                    <input type="text" class="form-control" name="email" value="<?= $cliente[0]->email ?>">
                </div>
            </div>

            <br /><br />
            <input type="submit" value="Salvar Edição" class="btn btn-outline-success"/>
        </div>
        
    </form>
        
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</body>

</html>