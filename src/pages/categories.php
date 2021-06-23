<?php  
    session_start();
    require "../fonctions/dbAccess.php";
    require "../fonctions/dbProduitFonctions.php";
    if(!isset($_GET["id"])){
        header("location: ../../index.php");
        exit;
    }
    include "../common/template.php";
?>
<section class="container bg-white">
    <h2>Nos nouveautés</h2>
    <div class="d-flex justify-content-around flex-wrap mt-3">
        <?php 
        foreach (articleByCat($_GET["id"]) as $value): ?>
                <div class="card_last_article card mx-5 my-1">
                    <img class="card-img-top" src="<?php echo $value->imgUrl ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $value->productName ?></h5>
                        <p class="card-text"><?php echo $value->description ?></p>
                        <p class="categorie"><?php echo $value->typeProduct ?></p>
                        <p class="prix"><?php echo $value->prix ?></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            <?php endforeach 
        ?>
    </div>
</section>
<?php
    // include "./src/common/listCategorie.php";
    include "../common/footer.php";
