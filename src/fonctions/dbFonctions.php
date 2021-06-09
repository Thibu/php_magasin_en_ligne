<?php 
function bdd()
{
    $bdd = new PDO("mysql:host=localhost;dbname=pcshop", "root", "");
    return $bdd;
};

function createUser($login, $email, $password, $key)
{
    $bdd = bdd();

    //Verif si mail et login existent

    $requete = $bdd->prepare("SELECT COUNT(*) as x FROM users 
                                WHERE login = ? or email = ?");

    $requete->execute(array($login, $email)) or die(print_r($requete->errorInfo(), TRUE));

    while($result = $requete->fetch()){
        if($result["x"] != 0){
            header("location: ../../src/pages/register.php?error=true&message=utilisateur déjà existant");
            exit();
        }
    }

    $stmt = $bdd->prepare("INSERT INTO users(login, email, password, ban) 
                            VALUES(?, ?, ?, ?)");

    $stmt->execute([$login, $email, $password, $key]) 
    or die(print_r($stmt->errorInfo(), TRUE));

    header("location: ../../src/pages/register.php?error=false&message=Votre compte est bien créer, veuillez vous connecter");
    exit();
};

?>