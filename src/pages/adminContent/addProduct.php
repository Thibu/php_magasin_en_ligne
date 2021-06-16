<?php 
    $result = getCategorie();
?>

<form class="container">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
    <input type="text" class="form-control" id="">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Image du produit</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description du produit</label>
    <input type="text" class="form-control" id="">
  </div>
  <select class="form-select" name="">
        <?php foreach(getCategorie() as $value): ?>
        <option value="<?php echo $value["categoryId"] ?>"><?php echo $value["typeProduct"] ?></option>
        <?php endforeach ?>
  </select>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>