<?php
    require_once __DIR__."/templates/header.php";
    include __DIR__."/lib/menu.php";

$articles = getArticles($pdo);

?>

<h1>Actualités</h1>

<div class="row text-center">
    <?php foreach ($articles as $key => $article){
        require __DIR__."/templates/part_article.php";
    }
    ?>
</div>

<?php include __DIR__."/templates/footer.php"?>

