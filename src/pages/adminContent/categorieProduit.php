<?php 
    $result = getCategorie();

?>
<section class="container d-flex flex-column align-items-center">
    <a class="btn btn-outline-success" href="">Add categorie</a>
    <?php foreach ($result as $value): ?>
        <h2><?php echo $value["typeProduct"]; ?></h2> 
    <?php endforeach; ?>
</section>