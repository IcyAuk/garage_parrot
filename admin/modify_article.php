<?php
require __DIR__ . "/templates/header.php";
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/article.php";

if (isset($_GET["id"])) {
    $articleId = (int)$_GET["id"];
    $article = getArticleById($pdo, $articleId);

    if (!$article) {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<h1 class="py-5">Modifier l'article</h1>

<form method="post" action="update_article.php">
    <input type="hidden" name="article_id" value="<?= $article["id"] ?>">

    <label for="year">Année:</label>
    <input type="text" name="year" value="<?= $article["year"] ?>" required>
    <br>

    <label for="km">Kilométrage:</label>
    <input type="text" name="km" value="<?= $article["km"] ?>" required>
    <br>

    <label for="price">Prix:</label>
    <input type="text" name="price" value="<?= $article["price"] ?>" required>
    <br>

    <label for="description">Description:</label>
    <textarea name="description" required><?= $article["description"] ?></textarea>
    <br>

    <input type="submit" value="Enregistrer les modifications">
</form>

<?php require __DIR__ . "/templates/footer.php"; ?>
