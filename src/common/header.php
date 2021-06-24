<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../../index.php"><img id="main_logo" src="../../src/img/main_logo.jpg" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      </ul>
      <form class="d-flex">
      <?php 
        if(($_SESSION["roleId"]) === "1"): ?>
          <a class="btn btn-outline-primary me-1" href="../../src/pages/admin.php">Admin<span> <i class="fab fa-angellist"></i></span></a>
        <?php endif;
        if($_SESSION["connecte"] == true): ?>
          <a class="btn btn-outline-danger me-1" href="../../src/fonctions/logout.php">Disconnect<span> <i class="fas fa-sign-out-alt"></i></span></a>
          <a class="btn btn-outline-success" href="#">My account<span> <i class="fas fa-user-circle"></i></span></a>
        <?php endif;
        if($_SESSION["connecte"] != true): ?>
          <a class="btn btn-outline-success me-1" href="../../src/pages/login.php">Log in<span> <i class="fas fa-sign-in-alt"></i></span></a>
          <a class="btn btn-outline-success" href="../../src/pages/register.php">Sign in<span> <i class="fas fa-file"></i></span></a>
        <?php endif; ?>
      </form>
    </div>
  </div>
</nav>