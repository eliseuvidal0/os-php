<?php
require_once 'mysql.php';

$id = "";
$data = "";
$cliente = "";
$cpf = "";
$cnpj = "";
$cep = "";
$rua = "";
$bairro = "";
$cidade = "";
$uf = "";
$telefone = "";
$celular = "";
$email = "";
$aparelho = "";
$marca = "";
$serie = "";
$preco = "";
$defeito = "";
$obs = "";
$servico = "";
$garantia = "";

$evazio = empty($_GET);
if (!$evazio) {
    $acao = $_GET['acao'];
    $id = $_GET['id'];
    if ($acao == "carregar") {
        $ordens = carregar($id);

        
        $id = $ordens['id'];
        $data = $ordens['data']; 
        $data = date('d/m/Y',strtotime($data));   
        $cliente = $ordens['cliente'];
        $cpf = $ordens['cpf'];
        $cnpj = $ordens['cnpj'];
        $cep = $ordens['cep'];
        $rua = $ordens['rua'];
        $bairro = $ordens['bairro'];
        $cidade = $ordens['cidade'];
        $uf = $ordens['uf'];
        $telefone = $ordens['telefone'];
        $celular = $ordens['celular'];
        $email = $ordens['email'];
        $aparelho = $ordens['aparelho'];
        $marca = $ordens['marca'];
        $serie = $ordens['serie'];
        $preco = $ordens['preco'];
        $defeito = $ordens['defeito'];
        $obs = $ordens['obs'];
        $servico = $ordens['servico'];
        $garantia = $ordens['garantia'];
    }

}

?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>O.S</title>

</head>

<body>

    <center>
        <h1>Ordem de Serviço</h1>
        <h5>Bigorrilho (41)3026-1991</h5>
        <br><br />
        <h6>Rua: Martim Afonso, 2800 Loja 11 - Bigorrilho,
            <br>
            Curitiba-PR.
        </h6>
    </center>
    <br>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <form form action="index.php" method="POST">
        <div class="container">
            <div class="form-row">
                <div class="col-md-4">
                    <label>N° da ordem:</label>
                    <input type="text" name="id" class="form-control" placeholder=" " value="<?= $id ?>" readonly>
                </div>
                <div class="col-md-4">
                    <label>Data de entrada:</label>
                    <input type="text" class="form-control data" name="data" value="<?= $data ?>" placeholder=" "readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <label>Cliente:</label>
                    <input type="text" class="form-control" name="cliente" value="<?= $cliente ?>" placeholder=" "readonly>
                </div>
                <div class="col-md-4">
                    <label>CPF:</label>
                    <input type="text" class="form-control cpf" name="cpf" value="<?= $cpf ?>" placeholder=" "readonly>
                </div>
                <div class="col-md-4">
                    <label>CNPJ:</label>
                    <input type="text" class="form-control cnpj" name="cnpj" value="<?= $cnpj ?>" placeholder=" "readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <label for="cep">CEP:</label>
                    <input id="cep" type="text" class="form-control cep" name="cep" value="<?= $cep ?>" placeholder=" " readonly>
                </div>
                <div class="col-md-4">
                    <label for="endereco">Endereço:</label>
                    <input id="endereco" type="text" class="form-control endereco" name="endereco" value="<?= $rua ?>" placeholder=" " readonly>
                </div>
                <div class="col-md-4">
                    <label for="bairro">Bairro:</label>
                    <input id="bairro" type="text" class="form-control bairro" name="bairro" value="<?= $bairro ?>" placeholder=" " readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <label for="cidade">Cidade:</label>
                    <input id="cidade" type="text" class="form-control cidade" name="cidade" value="<?= $cidade ?>" placeholder=" " readonly>
                </div>
                <div class="col-md-4">
                    <label for="uf">Estado:</label>
                    <input type="text" id="uf" class="form-control uf" name="uf" value="<?= $uf ?>" placeholder=" " readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <label>Telefone:</label>
                    <input type="text" class="form-control telefone" name="telefone" value="<?= $telefone ?>" placeholder=" " readonly>
                </div>
                <div class="col-md-4">
                    <label>Celular:</label>
                    <input type="text" class="form-control celular" name="celular" value="<?= $celular ?>" placeholder=" " readonly>
                </div>
                <div class="col-md-4">
                    <label>E-mail:</label>
                    <input type="text" class="form-control" name="email" value="<?= $email ?>" placeholder=" " readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3">
                    <label>Aparelho:</label>
                    <input type="text" class="form-control" name="aparelho" value="<?= $aparelho ?>" placeholder=" " readonly>
                </div>
                <div class="col-md-3">
                    <label>Marca/Modelo:</label>
                    <input type="text" class="form-control" name="marca" value="<?= $marca ?>" placeholder=" " readonly>
                </div>
                <div class="col-md-4">
                    <label>N° de série:</label>
                    <input type="text" class="form-control" name="serie" value="<?= $serie ?>" placeholder=" " readonly>
                </div>
                <div class="col-md-2">
                    <label>Preço:</label>
                    <input type="text" id="preco" class="preco form-control" name="preco" value="<?= $preco ?>" placeholder=" " readonly>
                </div>
            </div>

            <br></br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Defeito:</span>
                </div>
                <input type="text" class="form-control" aria-label="With textarea" name="defeito" value="<?= $defeito ?>" readonly></input>
            </div>
            <br></br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Observações:</span>
                </div>
                <input class="form-control" aria-label="With textarea" name="obs" value="<?= $obs ?>" readonly></input>
            </div>
            <br></br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Serviços:</span>
                </div>
                <input class="form-control" aria-label="With textarea" name="servico" value="<?= $servico ?>" readonly></input>
            </div>
            <div class="col-md-4">
                <label>Garantia:</label>
                <input type="text" id="garantia" class="form-control" name="garantia" value="<?= $garantia ?>" readonly placeholder=" ">
            </div>
            <br></br>
            <!--div caixas-->
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="aparelhoComSenha" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="aparelhoComSenha">Aparelho com senha</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="audio" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="audio">Áudio</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="bluetooth" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="bluetooth">Bluetooth</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="botaoHome" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="botaoHome">Botão home</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="botaoPower" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="botaoPower">Botão power</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="botaoVolume" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="botaoVolume">Botão volume</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="cameraFrontal" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="cameraFrontal">Câmera frontal</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="cameraTraseira" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="cameraTraseira">Câmera traseira</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="chip" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="chip">Chip</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="compraDeAparelho" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="compraDeAparelho">Compra de aparelho</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="digital" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="digital">Digital</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="impossivelRealizarTestes" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="impossivelRealizarTestes">Impossível realizar testes</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="touchFuncionando" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="touchFuncionando">Touch funcionando</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="microfone" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="microfone">Microfone</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="testeCarga" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="testeCarga">Teste carga</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="wifi" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="wifi">Wifi</label>
            </div>
    
    <br><br />
    <table border=3 cellspacing=0 cellpadding=2 bordercolor="666633">
        <tr>
            <td>
                <p>
                    <b>
                        Aparelhos abertos e por eventual DESISTÊNCIA do serviço pelo cliente será cobrado uma taxa de mão de obra pela desmontagem do aparelho, no valor de R$50,00.
                        <br>
                        APÓS o prazo de 30 dias que o aparelho for REPARADO, SERÁ COBRADO ALUGUEL pela permanêcia do aparelho que ficar na guarda do estabelecimeno no valor de R$5,00 o dia. Isto porque o estabelecimento terá despesas e responsabilidades pela guarda do aparelho.
                        <br></b>
                    A ASSISTÊNCIA não se responsabiliza pelas informações existentes no equipamento nem por eventuais danos que venham a ocorrer.
                    <br><b>
                        AUTORIZO O DESCARTE DO APARELHO CASO NÃO O RETIRE NO PRAZO DE 90 (NOVENTA) DIAS A CONTAR DE HOJE, DECLARO ESTAR CIENTE DAS INFORMAÇÕES ACIMA APRESENTADAS.
                    </b>
                </p>
            </td>
        </tr>
    </table>
    <br>
    Asinatura: ___________________________________________________________________________________________________
    <P>

        
            <!--<input type="button" class="btn btn-outline-success" value="Imprimir" onClick="window.print()" />-->
            <input type="submit" value="Imprimir" class="btn btn-outline-success" onClick="window.print()" />
            
        </form>
        </div>


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</body>

</html>