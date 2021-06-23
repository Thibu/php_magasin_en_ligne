<?php 
    require "./src/fonctions/dbProduitFonctions.php";
    ?>
<section>
    <h2>Nos promotions :</h2>
    <div class="d-flex justify-content-around flex-wrap">
        <?php foreach (fiveOnTop() as $value): ?>
            <div class="card card_promo my-2">
            <img class="card-img-top" src="<?php echo $value->imgUrl ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="categorie"><?php echo $value->typeProduct ?></p>
                <p class="nom_du_produit"><?php echo $value->productName ?></p>
                <p class="prix"><?php echo $value->prix ?>€</p>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</section>