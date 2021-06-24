<?php $titre = "Accueil"; 
session_start();

if(!isset($_SESSION["connecte"])){
    $_SESSION["connecte"] = false;
    $_SESSION["roleId"] = null;
};

// require "src/fonctions/dbAccess.php";
require "src/common/template.php"; ?>


 <div class="container bg-light">
    <div>
        <?php require "src/common/listCategorie.php" ?>
    </div>
    <div>
        <?php 
            if((isset($_GET["displayCat"])) && (isset($_GET["id"]))){

                require "src/pages/categories.php";
            }else{
                
                require "src/common/promotions.php";
                require "src/common/derniersArticles.php";
            }
        ?>
    </div>
</div>
<?php 
    require "src/common/footer.php";