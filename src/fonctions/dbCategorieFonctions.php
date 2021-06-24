<?php  
    // require "dbAccess.php";

    function getCategorie(){

        $bdd = bdd();
        $requete = $bdd->prepare("SELECT * from category");
        $requete->execute();

        $result = $requete->fetchAll();

        return $result;

    }

    function addCategorie($categorie){

        $bdd = bdd();

        $requete = $bdd->prepare("INSERT INTO category (typeProduct)
                                    VALUES (?)");
        $requete->execute([$categorie]);

    }















?>