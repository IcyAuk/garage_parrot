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


<h1 class="py-5">Commentaires en attente</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($articles as $article) { ?>
        <tr>
            <th scope="row"><?=$article["id"];?></th>
            <td><?=$article["title"];?></td>
            <td>Modifier | Supprimer</td>
        </tr>
        <?php } ?>
    </tbody>
</table>

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