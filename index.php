<?php
require_once "header.php";
require_once DAO_ARTICLE;

displayHeader("Accueil", "");
if (isset($_SESSION['name'])) {
?>

<a href="addArticle.php?navAction=addArticle">Ajouter un article</a>
<?php } ?>
<h2>Catalogue :</h2>
<table>
  <tbody>
  <?php
  $countRow = 0;
  foreach (DAOArticle::getCatalog() as $article) {
    if($countRow == 0) {echo "<tr>";}
    ?>
      <td>
        <h3 >
          <a href="article.php?idArticle=<?php echo $article->getId();?>">
            <?php echo $article->getName() ?>
          </a>
        </h3>
      </td>
    <?php
    if($countRow == 4) {
      echo "<tr>";
      $countRow = 0;
    }
    $countRow++;
  }
  if($countRow < 4) {
    echo "<tr>";
  }
  ?>
    </tr>
  </tbody>
</table>

<?php
require_once "footer.php";
displayFooter();
?>
