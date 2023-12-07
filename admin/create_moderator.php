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


<h1 class="py-5">Créer un Modérateur</h1>

<form action="#" method="get">

    <label for="email">Email</label> <br>
    <input type="email" name="email"> <br>
    
    <label for="last_name">Nom</label> <br>
    <input type="text" name="last_name"> <br>

    <label for="first_name">Prénom</label> <br>
    <input type="text" name="first_name"> <br>

    <label for="password">Mot de Passe</label> <br>
    <input type="password" name="password"> <br>

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