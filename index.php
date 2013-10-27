<?php
include_once 'class/ReadFiles.class.php';
include_once 'class/Pessoa.class.php';
include_once 'class/Agenda.class.php';

$GlobalReader = new ReadFiles();
$GlobalAgenda = new Agenda();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Projeto I - Web III - Salvando contatos em arquivos. </title>
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">

        <script>
            function alertApp(msg) {
                var container = document.getElementById("container");
                var element = document.createElement("DIV");
                var contentElement = document.createTextNode(msg);
                var closeimg = document.createElement("IMG");
                closeimg.className = "close_alert";
                closeimg.setAttribute("onclick", "closeAlert()");
                element.appendChild(closeimg);
                element.appendChild(contentElement);
                element.className = "alert";
                element.id = "alert";
                container.appendChild(element);
            }

            function closeAlert() {
                var container = document.getElementById("container");
                container.removeChild(document.getElementById("alert"));
            }

            function eventoEsc(evt) {
                evt = evt || window.event;
                if (evt.keyCode == 27) {
                    closeAlert();
                }
            }
        </script>
    </head>
    <body onkeyup="eventoEsc(event);">

        <!-- Layout Agenda -->
        <div id='app'>
            <div id='component1'></div>    
            <div id='container'>
                <?php
                if (!isset($_GET['app'])) {
                    include "home.php";
                } else {
                    if (file_exists($_GET['app'] . ".php"))
                        include $_GET['app'] . ".php";
                    else
                        include "home.php";
                }
                ?>
            </div>
            <div id='component2'>
                <a href='index.php'> <div id='component2_1'></div> </a>
            </div>    
        </div>
    </body>
</html>
