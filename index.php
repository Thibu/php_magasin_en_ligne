<?php $titre = "Accueil"; 
session_start();

if(!isset($_SESSION["connecte"])){
    $_SESSION["connecte"] = false;
    $_SESSION["roleId"] = null;
};

require "src/common/template.php";

if($_SESSION["connecte"] == true): ?>
    <h1>Bonjour <?= $_SESSION["login"] ?></h1>
<?php endif ?>
<?php 
    include "src/common/derniersArticles.php";
    include "src/common/promotions.php";





?>