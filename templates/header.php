<?php
    //require_once __DIR__ . "/../lib/config.php";
    //require_once __DIR__ . "/../lib/session.php";
    include __DIR__. "/../lib/config.php";
    include __DIR__. "/../lib/session.php";
    include __DIR__. "/../lib/menu.php";
    include __DIR__. "/../lib/pdo.php";
    include __DIR__. "/../lib/article.php";
    $currentPage =  basename($_SERVER["SCRIPT_NAME"]);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$mainMenu[$currentPage]["meta_description"]; ?>">
    <title><?=$mainMenu[$currentPage]["head_title"]; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/override-bootstrap.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="container">



            <header
                class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <div class="col-md-3 mb-2 mb-md-0">
                    <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
                        <img src="assets/images/parrot.PNG" alt="logo" width="160">
                    </a>
                </div>

                <ul class="nav nav-pills col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <?php foreach($mainMenu as $key => $menuItem){
                        if (!array_key_exists("header_excluded", $menuItem)) {
                        ?>
                        <li class="nav-item">
                            <a href="<?= $key; ?>" class="nav-link px-2 <?= ($key === $currentPage) ? "active" : ""; ?> ">
                                <?= $menuItem['title']; ?>
                            </a>
                        </li>
                    <?php } 
                        }?>
                </ul>

                <div class="col-md-3 text-end">

                    <?php if (isset($_SESSION["user"])){?>
                        <a href="admin/index.php" class="btn btn-outline-primary me-2">Administration</a>
                        <a href="logout.php" class="btn btn-outline-primary me-2">Déconnexion</a>
                    <?php } else {?>
                        <a href="login.php" class="btn btn-outline-primary me-2">Connexion</a>
                        <?php } ?>
                </div>
            </header>
    </div>

    <main>
    <div class="container col-xxl-8 px-4 py-5">