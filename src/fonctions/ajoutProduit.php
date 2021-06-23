<?php
require "dbAccess.php";

$bdd = bdd();
$onTop = 0;
if(isset($_POST["onTop"])){
    
    $onTop = 1;
}

// var_dump($onTop);
// die();
// var_dump($_FILES);
if (isset($_FILES["imgUrl"]) && $_FILES["imgUrl"]["error"] == 0) {
    $extensionArray = ["jpeg", "jpg", "png", "gif", "psd", "pdf", "ai", "jfif", "JPEG", "JPG", "PNG", "GIF", "PSD", "PDF", "AI", "JFIF"];
    $infoFichier = pathinfo($_FILES["imgUrl"]["name"]);
    $extensionImage = $infoFichier["extension"];
}
if (in_array($extensionImage, $extensionArray)) {
    $destination = "../../src/img/produit/" . time() . basename($_FILES["imgUrl"]["name"]);
    move_uploaded_file($_FILES["imgUrl"]["tmp_name"], $destination);
}

$sql = "INSERT INTO product (productName, imgUrl, description, categoryID, onTop)
                VALUES (?,?,?,?,?)";
$stmt = $bdd->prepare($sql);
$stmt->execute(array($_POST["productName"], $destination, $_POST["productDesc"], $_POST["categoryID"], $onTop));
// $stmt->execute(array("thib", "chemin", "test", 2, true));

$product_ID = $bdd->lastInsertId();

$sql = "INSERT INTO fichetechnique (productId, prix, tailleMemoire, processeur, processeurFab, resolutionEcran, tailleEcran, carteGraphique, typeHdd, tailleHdd, poids, OS)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $bdd->prepare($sql);
$stmt->execute(array($product_ID, $_POST["productPrice"], $_POST["productRam"], $_POST["productProco"], $_POST["productFabProco"], $_POST["productScreenResol"], $_POST["productScreenSize"], $_POST["productGraphicCard"], $_POST["productTypeStorage"], $_POST["productStoragePlace"], $_POST["productWeight"], $_POST["productOS"]));

header("location: ../../index.php");
exit();
