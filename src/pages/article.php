<?php 
    session_start();
    require "../fonctions/dbAccess.php";
    require "../fonctions/dbProduitFonctions.php";
    require "../common/template.php";
    $value = articleById($_GET["id"]);
    if(empty($value["productName"]) || empty($value["typeProduct"])){
        header("location: ../../index.php?error=1&message=Ce produit n'existe pas.");
        exit();
    }
?>
    <section class="articleId container bg-white">
        <h2><?php echo $value["productName"] ?></h2>
        <p><?php echo $value["processeurFab"].' '.$value["processeur"].' '.$value["carteGraphique"].' '.$value["typeHdd"].' '.$value["tailleHdd"].' '.$value["OS"] ?></p>
        <div class="d-flex flex-wrap flex-row justify-content-between">
            <div class="img_container col-5">
                <img class="img-fluid my-2" src="<?php echo $value["imgUrl"]?>" alt="">
            </div>
            <div class="d-flex flex-column col-7">
                <div class="">
                    <h5>Description :</h5>
                    <p><?php echo $value["description"] ?></p>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">Catégorie</th>
                        <td><?php echo $value["typeProduct"] ?></td>
                        <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Ram</th>
                        <td><?php echo $value["tailleMemoire"] ?>G</td>
                        <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Processeur</th>
                        <td colspan="2"><?php echo $value["processeur"] ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Carte graphique</th>
                        <td colspan="2"><?php echo $value["carteGraphique"] ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Resolution de l'écran</th>
                        <td><?php echo $value["resolutionEcran"] ?></td>
                        <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Taille de l'écran</th>
                        <td><?php echo $value["tailleEcran"] ?></td>
                        <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Stockage</th>
                        <td colspan="2"><?php echo $value["typeHdd"] ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Capacité de stockage</th>
                        <td colspan="2"><?php echo $value["tailleHdd"] ?>G</td>
                        </tr>
                        <tr>
                        <th scope="row">Poid</th>
                        <td colspan="2"><?php echo $value["poids"] ?>Kg</td>
                        </tr>
                        <tr>
                        <th scope="row">OS</th>
                        <td colspan="2"><?php echo $value["OS"] ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Prix</th>
                        <td colspan="2"><?php echo $value["prix"] ?>€</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
<?php   
    require "../common/footer.php";
?>