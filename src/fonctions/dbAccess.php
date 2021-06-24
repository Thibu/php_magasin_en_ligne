<?php 
function bdd()
{
    return new PDO("mysql:host=localhost;dbname=pcshop", "root", "");
};
