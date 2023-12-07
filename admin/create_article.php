<?php

require __DIR__ . "/templates/header.php";

require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/article.php";

if (isset($_GET["page"])){
    $page = (int)$_GET["page"];
} else {
    $page = 1;
}

$articles = getArticles($pdo, _ADMIN_ITEM_PER_PAGE_, $page);

$totalArticles = getTotalArticles($pdo);

$totalPages = ceil($totalArticles / _ADMIN_ITEM_PER_PAGE_);

?>


<h1 class="py-5">Créer un article</h1>

<form action="#" method="get">

    <label for="title">Titre</label> <br>
    <input type="text" name="title"> <br>
    
    <label for="price">Prix</label> <br>
    <input type="text" name="price"> <br>

    <label for="km">Kilométrage</label> <br>
    <input type="text" name="km"> <br>

    <label for="year">Année</label> <br>
    <input type="text" name="year"> <br>

    <label for="description">Description</label> <br>
    <textarea name="description" row="20" style="width:800px;height:600px;"></textarea> <br>

    <input type="submit" name="formSubmit" value="Soumettre">
</form>

<?php if($totalPages > 1) { ?>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php for($i = 1; $i <= $totalPages; $i++) {?>
        <li class="page-item <?php if($i === $page){echo "active";} ?> "><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
        <?php } ?>
    </ul>
</nav>
<?php } ?>

<?php require __DIR__ . "/templates/footer.php";?>