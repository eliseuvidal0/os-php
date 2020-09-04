<?php


include ('conn.php');

$campo="%{$_POST['campo']}%";

$sql=$mysqli->prepare('SELECT * FROM ordens WHERE cliente LIKE ?');
$sql->bind_param("s",$campo);
$sql->execute();
$sql->bind_result($id,$data, $cliente, $cpf, $cnpj, $cep, $rua, $bairro, $cidade, $uf, $telefone, $celular, $email, $aparelho, $marca, $serie, $preco, $defeito, $obs, $servico, $garantia);

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

while ($sql->fetch()) 
{
    $data = date('d/m/Y', strtotime($data));
    echo"
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