<section>
    <h2>Nos nouveautés</h2>
    <div class="d-flex justify-content-around flex-wrap mt-3">
        <?php 
            foreach (lastArticles() as $value): ?>
                <div class="card_last_article card mx-5 my-1">
                    <img class="card-img-top" src="<?php echo $value->imgUrl ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $value->productName ?></h5>
                        <p class="card-text"><?php echo $value->description ?></p>
                        <p class="categorie"><?php echo $value->typeProduct ?></p>
                        <p class="prix"><?php echo $value->prix ?>€</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            <?php endforeach 
        ?>
    </div>
</section>

    <!-- <div class="d-flex justify-content-around flex-wrap my-3">
        <div class="card mx-5 my-1" style="width: 18rem;">
            <img class="card-img-top" src="https://media.ldlc.com/r1600/ld/products/00/05/71/42/LD0005714266_1.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">LDLC PC ATOMIZER</h5>
                <h6>Pc fixe gaming</h6>
                <p class="card-text">Vous rêviez d'une machine puissante qui vous fera prendre l'ascendant sur votre adversaire ? LDLC l'a fait et vous propose le PC ATOMIZER ! 
                Cette configuration haut de gamme vous fera évoluer et découvrir la puissance des derniers composants pour toujours être à la pointe de la technologie.</p>
                <p class="categorie">Catégorie</p>
                <p class="nom_du_produit">Nom du produit</p>
                <p class="prix">Prix</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div> -->