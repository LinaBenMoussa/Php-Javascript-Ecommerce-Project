<?php
include "inc/pdo.php";
include "inc/functions.php";
$categories = getAllCategories();
$produits = getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SHOP</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <!-- début nav -->
    <?php include "inc/header.php"; ?>
    <!-- fin nav -->

    <?php
    if (!empty($_POST)) {
        $searchTerm = strtolower($_POST["search"]);
        echo "<h4 class='text-center p-3'>RÉSULTATS DE LA RECHERCHE : " . $_POST["search"] . "</h2>";
        $produits = rechProduit($searchTerm);
    }
    ?>
    <!-- test -->
    <?php
    if(isset($_GET['id'])){
    $id=$_GET['id'];}
    if(!empty($_GET['id'])){
        $produits = rechProduitCategorie($id);

    }
    ?>
<!-- test -->
    <div class="container">
        <div class="row col-12 mt-4">
            <?php
            foreach ($produits as $produit) {
                echo "<div class='col-3 mt-2'>
                      <div class='card ' style='width: 18rem;'>
                        <img width='150px' height='150px' src='img/" . $produit['image'] . "' class='card-img-top' alt='...'>
                        <div class='card-body'>
                          <h5 class='card-title'>" . $produit["nom"] . "</h5>
                          <p class='card-text'>" . $produit["prix"] . "DT</p>
                          <a href='produits.php?id=" . $produit["id"] . " ' class='btn btn-primary'>Découvrir Plus</a>
                        </div>
                      </div>
                </div>";
            }
            ?>
        </div>
    </div>

    <footer class="bg-dark text-center p-5 mt-5">
        <p class="text-white">
            Tous les droits sont réservés.
        </p>
    </footer>

    <script src="js/popper.min.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.7.0.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
