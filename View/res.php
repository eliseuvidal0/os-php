<?php
require_once("../DAO/OrdemDAO.php");

$ordemDAO = new OrdemDAO;
if(isset($_POST['campo'])){

    $campo="'%{$_POST['campo']}%'";

    $ordens = $ordemDAO->consultar($campo);

    echo"
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
            
            <td><a href='imprimir.php?acao=carregar&id=$id'>Carregar</button></td>
            <td><a href='consultar.php?acao=excluir&id=$id' >Excluir</button></td>
            
        </tr>  ";
    }
    echo "</tbody>
    </table>";
}
?>

