<?php 
        $bdd = new PDO("mysql:host=localhost;dbname=pcshop;charset=utf8", "root", "");


        if (isset($_FILES["imgUrl"]) && $_FILES["imgUrl"]["error"] == 0) {
            $extensionArray = ["jpeg", "jpg", "png", "gif", "psd", "pdf", "ai", "jfif", "JPEG", "JPG", "PNG", "GIF", "PSD", "PDF", "AI", "JFIF"];
            $infoFichier = pathinfo($_FILES["imgUrl"]["name"]);
            $extensionImage = $infoFichier["extension"];
        }
        if (in_array($extensionImage, $extensionArray)) {
            $destination = "../../src/img/produit/" . time() . basename($_FILES["imgUrl"]["name"]);
            move_uploaded_file($_FILES["imgUrl"]["tmp_name"], $destination);
        }
        var_dump($_FILES);


        $sql = "INSERT INTO product (productName, imgUrl, description, categoryID, onTop)
                        VALUES (?,?,?,?,?)";
        $stmt = $bdd->prepare($sql);
        $stmt->execute(array($_POST["productName"], $destination, $_POST["description"], $_POST["categoryId"], $_POST["onTop"]));

        $product_ID = $bdd->lastInsertId();

        $sql = "INSERT INTO fichetechnique (productId, prix, tailleMemoire, processeur, processeurFab, resolutionEcran, tailleEcran, carteGraphique, typeHdd, tailleHdd, poids, OS)
                        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $bdd->prepare($sql);
        $stmt->execute(array($product_ID, $_POST["prix"], $_POST["tailleMemoire"], $_POST["processeur"], $_POST["processeurFab"], $_POST["resolutionEcran"], $_POST["tailleEcran"], $_POST["carteGraphique"], $_POST["typeHdd"], $_POST["tailleHdd"], $_POST["poids"], $_POST["OS"]));

        header("location: ../../src/pages/adminContent/ajouterProduit.php");
        exit();

?>