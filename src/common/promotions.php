<?php 
    require "./src/fonctions/dbProduitFonctions.php";
?>
<section>
    <h2>Nos promotions :</h2>
    <div class="d-flex justify-content-around flex-wrap">
        <?php foreach (fiveOnTop() as $value): ?>
            <a class="card card_promo my-2" href="../../src/pages/article.php?Article&id=<?php echo $value->productId ?>">
                <img class="card-img-top" src="<?php echo $value->imgUrl ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="categorie"><?php echo $value->typeProduct ?></p>
                    <p class="nom_du_produit"><?php echo $value->productName ?></p>
                    <p class="prix"><?php echo $value->prix ?>€</p>
                </div>
            </a>
        <?php endforeach ?>
    </div>
</section>