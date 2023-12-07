<?php
    require_once __DIR__."/templates/header.php";
    require_once __DIR__."/../lib/article.php";
    require_once __DIR__."/../lib/pdo.php";
    

    $error = false;

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $article = getArticleById($pdo, $id);

        if ($article){
            $imagePath = getArticleImage($pdo, $article["image"]);
        } else {
            $error = true;
        }

        
    } else {
        $error = true;
    }
    ?>

<?php if(!$error) { ?>

<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
        <img src="<?= $imagePath; ?>" class="d-block mx-lg-auto img-fluid" alt="<?= htmlentities($article["title"]); ?>"
            width="400" height="auto" loading="lazy">
    </div>

    <div class="col-lg-6"> Lorem
        <h1 class="display-5 fw-bold text-body-emphasis 1h-1 mb-3"><?= $article["title"]; ?></h1>
        <p class="lead"><?= htmlentities($article["year"]); ?></p>
        <p class="lead"><?= htmlentities($article["km"]); ?> km</p>
        <p class="lead"><?= htmlentities($article["price"]); ?> €</p>
        <p class="lead"><?= htmlentities($article["description"]); ?></p>
    </div>
</div>
<?php include __DIR__."/templates/footer.php"; ?>

<?php } else { ?>
    <h1>Article Introuvable</h1>
<?php } ?>
