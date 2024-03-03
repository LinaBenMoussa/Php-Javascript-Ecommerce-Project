<?php
include "inc/pdo.php";
include "inc/functions.php";
include "session.php";
Verifier_session();
$categories = getAllCategories();
$produit=getAllProducts();
$commandes=array();
$total=0;
if(isset($_SESSION['panier'])){
    if(count($_SESSION['panier'][3])>0){
        $commandes=$_SESSION['panier'][3];
    }
    $total=$_SESSION['panier'][1];
}


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

   <h1 class="text-center">Panier</h1>
   <table class="table table-striped">
   <?php 
   
    foreach($commandes as $index=> $commande){
        echo"<tr>
        <td>".($index+1)."</td>
        <td><img width=50px height=50px src='img/".($commande[3])."'</td>
        <td>".($commande[2])."</td>
        <td>".($commande[0])."</td>
        <td>".($commande[1])."</td>
        
        <td>  <a href='supp-panier.php? id=".$index."' class='btn btn-danger'>Supprimer</a> </td>
        </tr>";
    }
   ?>
</table>
<div class="test-end">
    <h3>Total : <?php  echo $total; ?> </h3>

</div>
   <a href="valider.php" id='btnValider' class="btn btn-primary">Valider</a>
   

    <script src="js/popper.min.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.7.0.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
<script>
var btnValider = document.getElementById('btnValider');

btnValider.addEventListener('click', function() {
    alert('Votre commande a été validée avec succès !');

});

 </script>
