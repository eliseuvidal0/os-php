<?php
class Ordem {

    private $idOrdem;
    private $idCliente;
    private $idEndereco;
    private $data;
    private $aparelho;
    private $marca;
    private $serie;
    private $preco;
    private $defeito;
    private $obs;
    private $servico;
    private $garantia;
    private $opcao;
 
    public function getIdOrdem(){
        return $this->id;
    }

    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function getIdCliente(){
        return $this->idCliente;
    }

    public function setIdCliente($idCliente){
        $this->idCliente = $idCliente;
    }

    public function getIdEndereco(){
        return $this->idEndereco;
    }

    public function setIdEndereco($idEndereco){
        $this->idEndereco = $idEndereco;
    }

    public function getAparelho(){
        return $this->aparelho;
    }

    public function setAparelho($aparelho){
        $this->aparelho = $aparelho;
    }

    public function getMarca(){
        return $this->marca;
    }

    public function setMarca($marca){
        $this->marca = $marca;
    }

    public function getSerie(){
        return $this->serie;
    }

    public function setSerie($serie){
        $this->serie = $serie;
    }

    public function getPreco(){
        return $this->preco;
    }
    public function setPreco($preco){
        $this->preco = $preco;
    }

    public function getDefeito(){
        return $this->defeito;
    }

    public function setDefeito($defeito){
        $this->defeito = $defeito;
    }

    public function getObs(){
        return $this->obs;
    }

    public function setObs($obs){
        $this->obs = $obs;
    }

    public function getServico(){
        return $this->servico;
    }

    public function setServico($servico){
        $this->servico = $servico;
    }

    public function getGarantia(){
        return $this->garantia;
    }

    public function setGarantia($garantia){
        $this->garantia = $garantia;
    }

    public function getOpcao(){
        return $this->opcao;
    }

    public function setOpcao($opcao){
        $this->opcao = $opcao;
    }
}