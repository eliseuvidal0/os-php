<?php
class Cliente {

    private $idCliente;
    private $idEndereco;
    private $nome;
    private $cpf;
    private $cnpj;
    private $telefone;
    private $celular;
    private $email;
 
    public function getIdCliente(){
        return $this->idCliente;
    }

    public function getIdEndereco(){
        return $this->idEndereco;
    }

    public function setIdEndereco($idEndereco){
        $this->idEndereco = $idEndereco;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getCnpj(){
        return $this->cnpj;
    }

    public function setCnpj($cnpj){
        $this->cnpj = $cnpj;
    }
    
    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function getCelular(){
        return $this->celular;
    }

    public function setCelular($celular){
        $this->celular = $celular;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

}