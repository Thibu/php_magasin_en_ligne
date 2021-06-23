<?php 
    require "dbAccess.php";
    
function createUser($login, $email, $password)
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

    $stmt = $bdd->prepare("INSERT INTO users(login, email, password) 
                            VALUES(?, ?, ?)");

    $stmt->execute([$login, $email, $password]) 
    or die(print_r($stmt->errorInfo(), TRUE));

    header("location: ../../src/pages/register.php?error=false&message=Votre compte est bien créer, veuillez vous connecter");
    exit();
};

function getUserByLogin($login){
    
    $bdd = bdd();
    $requete = $bdd->prepare("SELECT login, password, roleId FROM users
                                WHERE login = ?");
    $requete->execute([$login]);
    // var_dump($result);
    $result = $requete->fetch();
    
    return $result;
    }

// function recupMdp($login){
//     $bdd = bdd();

//     $requete = $bdd->prepare("SELECT ban FROM users
//                                 WHERE login = ?");
//     $requete->execute(array($login));
//     $ban = $requete->fetch();

//     return $ban;
// }
// ?>