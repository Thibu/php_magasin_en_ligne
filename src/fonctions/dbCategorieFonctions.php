<?php  
    require "dbFonctions.php";


    function getCategorie(){

        $bdd = bdd();
        $requete = $bdd->prepare("SELECT * from category");
        $requete->execute();

        $result = $requete->fetchAll();

        return $result;

    }















?>