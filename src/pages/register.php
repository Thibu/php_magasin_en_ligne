<?php 
    $title = "Inscription";
    require "../../src/common/template.php";
    require "../../src/fonctions/dbFonctions.php" 
?>
<?php 
    if(isset($_POST["login"]) && isset($_POST["email"]) && isset($_POST["mdp"]) && isset($_POST["mdp2"])){
        
        if($_POST["mdp"] != $_POST["mdp2"]){
            header("location: ../../src/pages/register.php?error=true&message=mots de passe différents");
            exit;
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

        $mdpCrypt = crypt($mdp, $key);
        createUser($login, $email, $mdpCrypt, $key);
    }
    ?>



    <form action="../../src/pages/register.php" method="post" class="is-flex is-flex-direction-column is-align-items-center is-justify-content-center container column ">
    <?php 
    
        if((isset($_GET["error"]) && $_GET["error"] == true) || (isset($_GET["error"]) && $_GET["error"] === false)){
            echo '<h2>'.$_GET["message"].'</h2>';
        }
    ?>
    <div class="field column is-4 m-0">
        <label class="label">Login</label>
        <div class="control">
            <input class="input" name="login" type="text" value="">
        </div>
    </div>

    <div class="field column is-4 m-0">
        <label class="label">Mot de passe</label>
        <div class="control">
            <input class="input" name="mdp" type="password" value="">
        </div>
    </div>

    <div class="field column is-4 m-0">
        <label class="label">Confirmez votre mot de passe</label>
        <div class="control">
            <input class="input" name="mdp2" type="password" value="">
        </div>
    </div>

    <div class="field column is-4 m-0">
        <label class="label">Email</label>
        <div class="control">
            <input class="input" name="email" type="email" value="">
        </div>
    </div>

    <div class="field is-grouped m-0">
        <div class="control">
            <button class="button is-link">Submit</button>
        </div>
        <div class="control">
            <button class="button is-link is-light">Cancel</button>
        </div>
    </div>
</form>