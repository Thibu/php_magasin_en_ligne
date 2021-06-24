<?php
require "mesFonctions.php";
// Need deux fonctions: 1 pour récupérer l'id de ma catégorie de produit par rapport à son nom
function getCategoryIdByCategoryName($name)
{
    $bdd = bdd();
    $requete = $bdd->prepare("SELECT * FROM category WHERE typeProduct = ?");
    $requete->execute(array($name));

    while ($données = $requete->fetch()) :
        $categorieId = $données["categoryID"];
    endwhile;
    $requete->closeCursor();
    return $categorieId;
}

// 2 récupérer id produit en fonction de son nom
function getIdProductByProductName($name)
{
    $bdd = bdd();
    $requete = $bdd->prepare("SELECT productId FROM product WHERE productName = ?");
    $requete->execute(array($name));

    while ($données = $requete->fetch()) {
        $productId = $données["productId"];
    }
    $requete->closeCursor();
    return $productId;
}

//ENFIN function pour envoyer un produit dans ma DB 

function addNewProduct(
    $categorieProduit,
    $productName,
    $fichier,
    $prix,
    $tailleMemoire,
    $processeur,
    $processeurFab,
    $resolutionEcran,
    $tailleEcran,
    $carteGraphique,
    $typeHdd,
    $tailleHdd,
    $poids,
    $OS,
    $description,
    $onTop
) {
    // I. Envoyer ma photo dans ma db et dans mon repertoire
    $photoUrl = sendImg($fichier);
    // var_dump($photoUrl);

    // Envoyer les données destinée à la table product
    $bdd = bdd();

    // Récupérer l'id catetgorie par son nom
    // $categorieId = getCategoryIdByCategoryName($categorieProduit);

    // Envoyer produit dans table product
    $requete = $bdd->prepare("INSERT INTO product(productName, imgUrl, description, categoryId, onTop)
                                    VALUES(?,?,?,?,?)");
    $requete->execute(array($productName, $photoUrl, $description, $categorieProduit, $onTop)) or die(print_r($requete->errorInfo(), TRUE));

    //III. récupérer index produit qui vient d'être envoyé pour pouvoir ensuite envoyer la fiche technique dans ma db
    $productId = getIdProductByProductName($productName);

    //IV. envoyer fichier dans... fichetechnique :o
    $requete = $bdd->prepare("INSERT INTO fichetechnique(productId, prix, tailleMemoire, processeur, processeurFab, resolutionEcran, tailleEcran, carteGraphique, typeHdd, tailleHdd, poids, OS)
                                VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
    $requete->execute(array($productId, $prix, $tailleMemoire, $processeur, $processeurFab, $resolutionEcran, $tailleEcran, $carteGraphique, $typeHdd, $tailleHdd, $poids, $OS)) or die(print_r($requete->errorInfo(), TRUE));
    // rediriger vers admin et informe que tout est ok
    header("location: ../../src/pages/admin.php?ajouterProduit=true&message=Produit Correctement ajouté dans la DB");
    exit();
}