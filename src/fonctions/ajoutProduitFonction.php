<?php
require "../fonctions/dbFonctions.php";

$bdd = bdd();

var_dump($_POST);
var_dump($_FILES);
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
$stmt->execute(array($_POST["productName"], $destination, $_POST["dproductDesc"], $_POST["categoryID"], $_POST["onTop"]));

$product_ID = $bdd->lastInsertId();

$sql = "INSERT INTO fichetechnique (productId, prix, tailleMemoire, processeur, processeurFab, resolutionEcran, tailleEcran, carteGraphique, typeHdd, tailleHdd, poids, OS)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $bdd->prepare($sql);
$stmt->execute(array($product_ID, $_POST["productPrice"], $_POST["productRam"], $_POST["productProco"], $_POST["productFabProco"], $_POST["productScreenResol"], $_POST["productScreenSize"], $_POST["productGraphicCard"], $_POST["productTypeStorage"], $_POST["productStoragePlace"], $_POST["productWeight"], $_POST["productOS"]));

// header("location: ../../src/pages/adminContent/addProduct.php");
// exit();
