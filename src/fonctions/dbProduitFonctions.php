<?php 

function fiveOnTop(){

    $bdd = bdd();

    $requete = $bdd->prepare("SELECT p.productId, p.productName, p.imgUrl, ft.prix ,c.typeProduct 
                                from product p
                                INNER JOIN category c
                                on c.categoryId = p.categoryId
                                INNER JOIN fichetechnique ft
                                on ft.productId = p.productId
                                WHERE p.onTop = 1
                                ORDER BY p.productId
                                DESC
                                LIMIT 5");
    $requete->execute([]);
    $result = $requete->fetchAll(PDO::FETCH_OBJ);

    return $result;
}

function lastArticles(){

    $bdd = bdd();

    $requete = $bdd->prepare("SELECT *
                                from product p
                                INNER JOIN category c
                                on c.categoryId = p.categoryId
                                INNER JOIN fichetechnique ft
                                on ft.productId = p.productId
                                ORDER BY p.productId 
                                DESC
                                LIMIT 12");
    $requete->execute([]);
    $result = $requete->fetchAll(PDO::FETCH_OBJ);

    return $result;                     
}

function articleByCat($id){

    $bdd = bdd();

    $requete = $bdd->prepare("SELECT *
                                from product p
                                INNER JOIN category c
                                on c.categoryId = p.categoryId
                                INNER JOIN fichetechnique ft
                                on ft.productId = p.productId
                                WHERE c.categoryId = ?
                                ORDER BY p.productId
                                DESC ");
    $requete->execute([$id]);
    $result = $requete->fetchAll(PDO::FETCH_OBJ);

    return $result;

}

function articleById($id){

    $bdd = bdd();

    $requete = $bdd->prepare("SELECT *
                                from product p
                                INNER JOIN category c
                                on c.categoryId = p.categoryId
                                INNER JOIN fichetechnique ft
                                on ft.productId = p.productId
                                WHERE p.productId = ?
                                ORDER BY p.productId");
    $requete->execute([$id]);
    $result = $requete->fetch();

    return $result;

}
