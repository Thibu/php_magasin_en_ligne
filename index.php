<?php $titre = "Accueil"; 
session_start();

if(!isset($_SESSION["connecte"])){
    $_SESSION["connecte"] = false;
};

require "src/common/template.php";
if($_SESSION["connecte"] == true): ?>
    <h1>Bonjour <?= $_SESSION["login"] ?></h1>
<?php endif ?>