<?php

/*
Page 1:
LIMIT 0, 10
Page 2:
LIMIT 10, 10
Page 3:
LIMIT 20, 10
Page 4
LIMIT 30, 10

param : page et limit
offset = (page - 1) * limit
Page 3:
30 = (3-1) * 10

*/

function getArticles(PDO $pdo, int $limit = null, $page = null):array|bool
{
    $stmt = "SELECT * FROM articles ORDER BY id DESC";

    if($limit && !$page){
        $stmt .= " LIMIT :limit";
    }  

    if ($page){
        $stmt .= " LIMIT :offset, :limit";
    }
    
    $query = $pdo->prepare($stmt);

    if($limit){
        $query->bindValue(':limit',$limit,PDO::PARAM_INT);
    }

    if($page){
        $offset = ($page - 1) * $limit;
        $query->bindValue(':offset',$offset,PDO::PARAM_INT);
    }

    $query->execute();
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);

    return $articles;
}

function getTotalArticles(PDO $pdo):int
{
    $stmt = "SELECT COUNT(*) as total FROM articles";
    
    $query = $pdo->prepare($stmt);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result["total"];
}

function getArticleById(PDO $pdo, int $id):array|bool
{
    $stmt = "SELECT * FROM articles WHERE id = :id";

    
    $query = $pdo->prepare($stmt);
    $query->bindValue(':id',$id,PDO::PARAM_INT);

    $query->execute();
    $articles = $query->fetch(PDO::FETCH_ASSOC);

    return $articles;
}

function getArticleImage(PDO $pdo, string|null $image)
{
    $stmt = "SELECT * FROM articles WHERE image = :image";
    $query = $pdo->prepare($stmt);
    $query->bindValue(':image',$image,PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);

    $image = $result["image"];

    if($image === null){
        return "images/parrot.png";
    } else {
        return "uploads/articles/".htmlentities($image);
    }
}

/* if (isset($_POST["saveArticle"])){

    $fileName = null;
    //si fichier est envoyé
    if(isset($_FILES["file"]["tmp_name"]) && $_FILES["file"]["tmp_name"] != ''){
        $checkImage = getimagesize($_FILES["file"]["name"]);
        if($checkIMage !== false){
            $fileName = 
        }
    }

}
*/