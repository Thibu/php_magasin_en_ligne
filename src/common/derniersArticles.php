<section>
    <h2>Nos nouveautés :</h2>
    <div class="d-flex justify-content-around flex-wrap mt-3">
        <?php 
            foreach (lastArticles() as $value): ?>
                <a class="btn shadow mb-3 bg-body rounded card_last_article card mx-5 my-1" href="../../src/pages/article.php?Article&id=<?php echo $value->productId ?>">
                    <img class="card-img-top" src="<?php echo $value->imgUrl ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $value->productName ?></h5>
                        <p class="card-text"><?php echo $value->description ?></p>
                        <p class="prix fw-bold"><?php echo $value->prix ?>€</p>
                    </div>
                </a>
            <?php endforeach 
        ?>
    </div>
</section>