<?php
if (isset($_GET['buscarContato'])) {
    if (empty($_GET['nome']) && empty($_GET['profissao'])) {
        echo "<script> alert('Preencha pelo menos 1 campo'); </script>";
        echo "<script> history.go(-1); </script>";
    } else if (!empty($_GET['nome'])) {
        $nome = $_GET['nome'];

        if (($pessoas = $GlobalReader->read())) {
            $GlobalAgenda->setContatos($pessoas);
            $exibe = $GlobalAgenda->buscaContato($nome, "nome");
        }
    } else if (!empty($_GET['profissao'])) {
        $profissao = $_GET['profissao'];

        if (($pessoas = $GlobalReader->read())) {
            $GlobalAgenda->setContatos($pessoas);
            $exibe = $GlobalAgenda->buscaContato($profissao, "profissao");
        }
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
                <li><a href="?app=contact_novo">Novo</a></li>
                <li class="active"><a href="?app=contact_search">Pesquisar</a></li>
            </ul>
        </div>
    </div>
    <div id='box_content'>
        <?php if (!isset($_GET['buscarContato'])) { ?>
            <h4> Pesquisar contato </h4>

            <!-- Adicionar novo contato; -->
            <form method='get' name='buscarContato'>
                <label> Pelo Nome </label> <input type="text" name="nome" placeholder="Insira um nome"> <br>
                <label> Pela Profissão: </label> <input type="text" name="profissao" placeholder="Insire uma profissão"> <br>
                <input type="hidden" name='app' value="contact_search">
                <input type="submit" name='buscarContato' value='Buscar' class='btn btn-primary'>
            </form>
        <?php } else { ?>
            <h4> Lista de Contatos (<?= $totalContatos = count($exibe); ?>) </h4>
            <br>
            <table class="table table-hover">
                <?php
                foreach ($exibe as $contato) {
                    ?>
                    <tr>
                        <td><a href='#' onclick='alertApp("Nome: <?= $contato->getNome(); ?> \n Profissão: <?= $contato->getProfissao(); ?> \n Telefone: <?= $contato->getTelefone(); ?> ")'> 
                            <?=
                            "#". $contato->getCodigoPessoa() . " - " . $contato->getNome();
                            ?></a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>
    </div>
</div>