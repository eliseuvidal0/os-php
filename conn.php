<?php


$servidor = "localhost";
$usuario = "root";
$senha = "root";
$db = "ordem";

$mysqli = new mysqli ($servidor,$usuario,$senha,$db);

/*
    $sql = $mysqli->prepare('SELECT * FROM ordens');
    $sql->execute();
    $sql->bind_result($id, $data, $cliente, $cpf, $cnpj, $cep, $rua, $bairro, $cidade, $uf, $telefone, $celular, $email, $aparelho, $marca, $serie, $preco, $defeito, $obs, $servico, $garantia);
*/
?>