<?php
session_start();
include './config/config.php';
function afficherHeader($titrePage, $nomCSS) {
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Book en ligne">
        <link rel="stylesheet" type="text/css" href="styles\general.css">
        <link rel="stylesheet" type="text/css" href="styles\header.css">
        <?php if($nomCSS) { ?>
            <link rel="stylesheet" type="text/css" href="styles\<?php echo $nomCSS ?>.css">
        <?php } ?>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <title><?php echo $titrePage ?></title>
    </head>

    <body>
        <p>Header</p>
    <?php
}
?>
