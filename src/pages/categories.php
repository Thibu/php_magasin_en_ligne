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
    <h2>Résultats:</h2>
    <div class="d-flex justify-content-around flex-wrap mt-3">
        <?php 
        foreach (articleByCat($_GET["id"]) as $value): ?>
                <div class="shadow p-3 mb-5 bg-body rounded card_last_article card mx-5 my-1">
                    <img class="card-img-top" src="<?php echo $value->imgUrl ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $value->productName ?></h5>
                        <p class="card-text"><?php echo $value->description ?></p>
                        <p class="prix fw-bold"><?php echo $value->prix ?>€</p>
                        <a href="article.php?Article&id=<?php echo $value->productId ?>" class="btn btn-primary">Vers l'article</a>
                    </div>
                </div>
            <?php endforeach 
        ?>
    </div>
</section>
<?php
    // include "./src/common/listCategorie.php";
    include "../common/footer.php";
