<?php 
    $result = getCategorie();
?>

<form class="container" method="POST" action="../../../src/fonctions/ajoutProduitFonction.php">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
    <input type="text" name="productName" class="form-control" id="">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description du produit</label>
    <input type="text" name="productDesc" class="form-control" id="">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Prix</label>
    <input type="text" name="productPrice" class="form-control" id="">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Ram</label>
    <input type="text" name="productRam" class="form-control" id="">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Processeur</label>
    <input type="text" name="productProco" class="form-control" id="">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Fabriquant du processeur</label>
    <input type="text" name="productFabProco" class="form-control" id="">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Résolution d'écran</label>
    <input type="text" name="productScreenResol" class="form-control" id="">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Taille de l'écran</label>
    <input type="text" name="productScreenSize" class="form-control" id="">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Carte graphique</label>
    <input type="text" name="productGraphicCard" class="form-control" id="">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Poids</label>
    <input type="text" name="productWeight" class="form-control" id="">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Système d'exploitation</label>
    <input type="text" name="productOS" class="form-control" id="">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Type de storage</label>
    <input type="text" name="productTypeStorage" class="form-control" id="">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Quantité de stockage</label>
    <input type="text" name="productStoragePlace" class="form-control" id="">
  </div>
  <div class="mb-3">
      <label for="formFile" class="form-label">Image du produit</label>
      <input class="form-control" name="imgUrl" type="file" id="formFile" require>
  </div>
  <select class="form-select" name="categoryID">
        <?php foreach(getCategorie() as $value): ?>
        <option value="<?php echo $value["categoryId"] ?>"><?php echo $value["typeProduct"] ?></option>
        <?php endforeach ?>
  </select>
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" name="onTop" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    On Top
  </label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>