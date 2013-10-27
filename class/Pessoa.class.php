<?php

/* Pessoa Class */

class Pessoa {

    public static $codigo = 0;
    
    private $nome;
    private $profissao;
    private $telefone;
    private $codigoPessoa;
    
    function __construct($nome, $profissao, $telefone) {
        self::$codigo++;
        
        $this->nome = $nome;
        $this->profissao = $profissao;
        $this->telefone = $telefone;
        $this->codigoPessoa = self::$codigo;
    }

    
    public function getCodigoPessoa() {
        return $this->codigoPessoa;
    }

    public function setCodigoPessoa($codigoPessoa) {
        $this->codigoPessoa = $codigoPessoa;
    }
        
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getProfissao() {
        return $this->profissao;
    }

    public function setProfissao($profissao) {
        $this->profissao = $profissao;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

}

?>
