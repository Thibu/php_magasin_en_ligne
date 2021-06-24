<?php 
    $title = "Inscription";
    session_start();
    require "../../src/common/template.php";
    require "../../src/fonctions/dbFonctions.php" 
?>
<?php 
    if($_SESSION["connecte"]){
        header("location: ../../index.php?error=true&message=vous etes déjà connecté");
        exit();
    }
    if(isset($_POST["login"]) && isset($_POST["email"]) && isset($_POST["mdp"]) && isset($_POST["mdp2"])){
        
        if($_POST["mdp"] != $_POST["mdp2"]){
            header("location: ../../src/pages/register.php?error=true&message=Les mots de passe ne correspondent pas");
            exit();
        }

        //sanetization des données:

        $options = array(
            'login' => FILTER_SANITIZE_STRING,
            'mdp' => FILTER_SANITIZE_STRING,
            'email' => FILTER_VALIDATE_EMAIL
        );

        $result = filter_input_array(INPUT_POST, $options);

        $login = $result["login"];
        $email = $result["email"];
        $mdp = $result["mdp"];
        var_dump($email);

        //Cryptage du mdp
        
        $key = rand();
        $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);

        $mdpCrypt = crypt($mdp, $key);
        createUser($login, $email, $mdpHash);
    }
    ?>

    <form action="../../src/pages/register.php" method="post" class="container col-4 bg-light">
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
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Verification du mot de passe</label>
            <input type="password" name="mdp2" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>