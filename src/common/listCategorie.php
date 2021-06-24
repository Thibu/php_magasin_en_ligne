<?php 
    require "src/fonctions/dbCategorieFonctions.php";
?>

<nav class="navbar navbar-expand navbar-light bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
      <ul class="navbar-nav d-flex flex-wrap">
        <?php foreach (getCategorie() as $value): ?>
          <li class="nav-item border border-2 rounded-1 mx-2"><a class="nav-link" href="../src/pages/categories.php?displayCat&id=<?php echo $value["categoryId"] ?>"><?php echo $value["typeProduct"]; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</nav>