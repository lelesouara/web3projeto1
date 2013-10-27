<?php

    if(isset($_GET['inserirNovoContato'])){
        if(!empty($_GET['nome']) && !empty($_GET['profissao']) && !empty($_GET['telefone'])){
            $nome       = $_GET['nome'];
            $profissao  = $_GET['profissao'];
            $telefone   = $_GET['telefone'];
            
            $Pessoa = new Pessoa($nome,$profissao, $telefone);
            $GlobalAgenda->addPessoa($Pessoa);
            
            $GlobalReader->write($GlobalAgenda->getContatos());
            
        }else{
            echo "<script> alert('Preencha todos os campos!'); </script>";
            echo "<script> history.go(-1); </script>";
        }
    }

?>

<link rel="stylesheet" href="css/contact.css" type="text/css">

<div id='wallpaper_contact'>
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <img src='img/contact.png' class="brand" width="20">
            <ul class="nav">
                <li><a href="?app=contact">Listar</a></li>
                <li class="active"><a href="?app=contact_novo">Novo</a></li>
                <li><a href="?app=contact_search">Pesquisar</a></li>
            </ul>
        </div>
    </div>
    <div id='box_content'>
        <h4> Adicionar novo contato </h4>
        
        <!-- Adicionar novo contato; -->
        <form method='get' name='inserirNovoContato'>
            <label> Nome: </label> <input type="text" name="nome" placeholder="Insira um nome"> <br>
            <label> Profissão: </label> <input type="text" name="profissao" placeholder="Programador"> <br>
            <label> Telefone: </label> <input type="text" name="telefone" placeholder="(67) 3333-8888"> <br>
            <input type="hidden" name='app' value="contact_novo">
            <input type="submit" name='inserirNovoContato' value='Adicionar Novo' class='btn btn-primary'>
        </form>

    </div>
</div>