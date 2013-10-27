<?php
//carrega dados.
if (($pessoas = $GlobalReader->read())) {
    $GlobalAgenda->setContatos($pessoas);
    $totalContatos = count($pessoas);
} else {
    $totalContatos = 0;
}
?>

<link rel="stylesheet" href="css/contact.css" type="text/css">

<div id='wallpaper_contact'>
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <img src='img/contact.png' class="brand" width="20">
            <ul class="nav">
                <li class="active"><a href="?app=contact">Listar</a></li>
                <li><a href="?app=contact_novo">Novo</a></li>
                <li><a href="?app=contact_search">Pesquisar</a></li>
            </ul>
        </div>
    </div>

    <div id='box_content'>
        <h4> Lista de Contatos (<?= $totalContatos; ?>) </h4>
        <br>
        <table class="table table-hover">
            <?php
            foreach ($GlobalAgenda->getContatos() as $contato) {
                ?>
                <tr>
                    <td><a href='#' onclick='alertApp("Nome: <?= $contato->getNome(); ?> \n\r Profissão: <?= $contato->getProfissao(); ?> \n\r Telefone: <?= $contato->getTelefone(); ?> ")'> 
                            <?=
                            "#". $contato->getCodigoPessoa() . " - " . $contato->getNome();
                            ?></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>