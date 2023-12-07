<?php
    $imagePath = getArticleImage($pdo, $article["image"]);
?>

<div class="col-md-4 my-2">
<div class="card">
    <img src="<?= $imagePath; ?>" class="card-img-top" alt="<?=htmlentities($article['title'])?>" width="300" height="auto">
    <div class="card-body">
        <h5 class="card-title"><?=htmlentities($article["title"])?></h5>
        <p class="card-text"><?= htmlentities(substr($article["price"], 0, 70)) ?> €</p>
        <p class="card-text"><?= htmlentities(substr($article["year"], 0, 70)) ?></p>
        <p class="card-text"><?= htmlentities(substr($article["km"], 0, 70)) ?> km</p>
        <p class="card-text"><?= htmlentities(substr($article["description"], 0, 70)) ?></p>
        <a href='actualite.php?id=<?=$article["id"]?>' class='btn btn-primary'>Lire la suite</a>
    </div>
</div>
</div>