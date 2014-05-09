<?php
include_once 'valido.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Luis Losi SA</title>
        <?php include_once "../includes/php/estilos.php";?>
    </head>
    <body>
        <?php include_once "../includes/php/header.php"; ?>
        <div class="container">
            <h2>Ultimas Obras</h2>
            <!--<img src="../images/ultimas-obras.jpg" alt="Ultimas Obras" title="Ultimas Obras">-->
            <?php
            include_once 'listado.php';
            ?>
        </div>
        <?php // include_once $_SERVER['DOCUMENT_ROOT']."/sgo/includes/php/footer.php";?>
        <?php include_once "../includes/php/footer.php";?>
        <?php // include_once $_SERVER['DOCUMENT_ROOT']."/sgo/includes/php/flatui_js.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>
