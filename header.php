<?php
session_start();
include './config/config.php';
function displayHeader($titrePage, $nomCSS) {
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Book en ligne">
        <?php if($nomCSS) { ?>
            <link rel="stylesheet" type="text/css" href="styles\<?php echo $nomCSS ?>.css">
        <?php } ?>
        <title><?php echo $titrePage ?></title>
    </head>

    <body>
      <a href="http://qualite-logiciel-stock"><h1>Decathlux</h1></a>
      <form action="search.php" method="get">
        <input type="text" name="q" value="<?php if(isset($_GET["q"])) {
          echo $_GET['q'];
        } ?>">
        <input type="submit" name="recherche">
      </form>
    <?php
}
?>
