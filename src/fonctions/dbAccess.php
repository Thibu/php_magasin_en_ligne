<?php 
function bdd()
{
    $bdd = new PDO("mysql:host=localhost;dbname=pcshop", "root", "");
    return $bdd;
};
