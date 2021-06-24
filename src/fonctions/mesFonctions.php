<?php
function sendImg($photo)
{
    // var_dump($photo);
    $dossier = "../../src/img/produit/" . time();
    $extensionArray = ["jpeg", "jpg", "png", "gif", "psd", "pdf", "ai", "jfif", "JPEG", "JPG", "PNG", "GIF", "PSD", "PDF", "AI", "JFIF"];

    $infoFichier = pathinfo($photo["name"]);
    // var_dump($dossier);
    $extensionImg = $infoFichier["extension"];

    if (in_array($extensionImg, $extensionArray)) {
        $dossier .= basename($photo["name"]);
        // var_dump($dossier);

        move_uploaded_file($photo["tmp_name"], $dossier);
        return $dossier;
        // header('location: ../../src/pages/admin.php');
    }
}
