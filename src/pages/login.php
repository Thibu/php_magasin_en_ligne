<?php 
    $title = "Connexion";
    session_start();
    require "../../src/common/template.php";
    require "../../src/fonctions/dbFonctions.php";
?>
<?php
    if($_SESSION["connecte"]){
        header("location: ../../index.php?error=true&message=vous etes déjà connecté");
        exit();
    }
    if(isset($_POST["login"]) && isset($_POST["mdp"])){
        
        
        //sanetization des données:
        
        $options = array(
            'login' => FILTER_SANITIZE_STRING,
            'mdp' => FILTER_SANITIZE_STRING
        );
        
        $result = filter_input_array(INPUT_POST, $options);
        
        $login = $result["login"];
        $mdp = $result["mdp"];
        
        // $mdpHash = recupMdp($login);
        // $mdpCrypt = crypt($mdp, $key[0]);

        $loging = getUserByLogin($login);
  
        if($login === $loging["login"] && password_verify($mdp, $loging["password"])){
            $_SESSION["connecte"] = true;
            $_SESSION["login"] = $login;
            $_SESSION["roleId"] = $loging["roleId"];

            header("location: ../../index.php?error=false&message=Vous etes maintenant connecté");
            exit();
        }else{
            header("location: ../../src/pages/login.php?error=true&message=mot de passe ou login incorrect");
            exit();
        }
    }
    ?>


<section class="container col-3 shadow p-3 mb-3 mt-3 bg-body rounded">
    <form action="" method="post" class="container">
    <?php 
    
        if((isset($_GET["error"]) && $_GET["error"] == true) || (isset($_GET["error"]) && $_GET["error"] === false)){
            echo '<h2>'.$_GET["message"].'</h2>';
        }
    ?>

    <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Login</label>
                <input type="text" name="login" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" name="mdp" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

</section>