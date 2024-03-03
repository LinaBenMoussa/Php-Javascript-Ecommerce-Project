
<?php
include "inc/pdo.php";
include "inc/functions.php";
$categories=getAllCategories();
if(isset($_GET['id'])){
  $produit=getProduitById($_GET['id']);
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
<!-- debut nav -->
<?php 
   include "inc/header.php";
   ?>
<!-- fin nav -->



<div class="row col-12 mt-4">
<div class="card col_8 offset-2" style="width:40rem;">

  <img src="img/<?php echo $produit["image"] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $produit["nom"] ?></h5>
    <p class="card-text"><?php echo $produit["description"] ?></p>
    <a href="" >
    </a>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo $produit["prix"] ?>DT</li>
    <?php 
    foreach($categories as $index=>$categorie){
      if($categorie['id']== $produit['categorie']){
        print '<button  class="btn btn-success mb-2">'.$categorie["nom"] .'</button>';}
    }
    ?>
    


  </ul>
  <div><br>
    <form action="commander.php" method="post">
    <input type="hidden" value="<?php echo $produit['image'] ?>" name="image">
    <input type="hidden" value="<?php echo $produit['nom'] ?>" name="nom">
      <input type="hidden" value="<?php echo $produit['id'] ?>" name="produit">
      <input name="quantite" type="number" class="form-control" step="1" placeholder="Quantité du produit">
    <br><button type="submit" class="btn btn-primary">Commander</button>
    </form><br>
  </div>
</div>


<footer class="bg-dark text-center p-5 mt-5">
  <p class="text-white">
      tous les droits sont reserves
  </p>
</footer>
<script src="js/popper.min.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.7.0.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>