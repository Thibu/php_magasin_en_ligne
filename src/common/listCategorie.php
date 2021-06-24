<?php 
    require "src/fonctions/dbCategorieFonctions.php";
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php foreach (getCategorie() as $value): ?>
          <li class="nav-item"><a class="nav-link" href="../src/pages/categories.php?displayCat&id=<?php echo $value["categoryId"] ?>"><?php echo $value["typeProduct"]; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</nav>