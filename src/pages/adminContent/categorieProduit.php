<?php 

if(isset($_POST["addCategorie"])){
    $option = array(
        'addCategorie' => FILTER_SANITIZE_STRING
    );
    
    $result = filter_input_array(INPUT_POST, $option);
    
    $categorie = $result["addCategorie"];
    
    addCategorie($categorie);
}


?>
<section class="col-3 container d-flex flex-column align-items-left shadow p-3 mb-3 mt-3 bg-body rounded">
    <?php foreach (getCategorie() as $value): ?>
        <h3><?php echo $value["typeProduct"]; ?></h2> 
    <?php endforeach; ?>
    <form class="row row-cols-lg-auto g-3 align-items-center my-1" action="" method="post">
        <div class="col-12">
            <input type="text" class="form-control" name="addCategorie">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
</section>