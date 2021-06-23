<?php $titre = "Accueil"; 
session_start();

if(!isset($_SESSION["connecte"])){
    $_SESSION["connecte"] = false;
    $_SESSION["roleId"] = null;
};

require "src/common/template.php"; ?>


 <div class="container bg-light">
    <div>
        <?php include "src/common/listCategorie.php" ?>
    </div>
    <div>
        <?php 
            if((isset($_GET["displayCat"])) && (isset($_GET["id"]))){

                include "src/pages/categories.php";
            }else{
                
                include "src/common/promotions.php";
                include "src/common/derniersArticles.php";
            }
        ?>
    </div>
</div>
<?php 
    require "src/common/footer.php";