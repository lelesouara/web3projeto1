<?php
/* Agenda Class */

class Agenda {

    private $contatos = array();
    
    public function getContatos() {
        return $this->contatos;
    }

    public function setContatos(Array $contatos) {
        $this->contatos = $contatos;
    }
    
    public function addPessoa(Pessoa $pessoa){
        $this->contatos[] = $pessoa;
    }
    
    public function buscaContato($param, $orderby){
        $arr = Array();
        if($orderby == "nome"){
            foreach ($this->contatos as $contato){
                if($contato->getNome() == $param){
                    $arr[] = $contato;
                }
            }
        }else if($orderby == "profissao"){
            foreach ($this->contatos as $contato){
                if($contato->getProfissao() == $param){
                    $arr[] = $contato;
                }
            }
        }else{
            return null;
        }
        return $arr;
    }


}

?>
