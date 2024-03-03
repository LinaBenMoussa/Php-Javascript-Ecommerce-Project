<?php
include "inc/pdo.php";
include "inc/functions.php";
$show=0;
$categories=getAllCategories();
if (!empty($_POST)) {
  if (AddVisiteur($_POST)) {
      $show = 1;
  }
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
<!-- debut nav -->
<?php 
   include "inc/header.php";
   ?>
<!-- fin nav -->
<?php
    if($show==1){
    echo "<script>
    var div = document.createElement('div');
    div.innerHTML = 'votre compte a bien été créé <a href=connexion.php>Connexion ?</a>';
    div.style = 'background-color: rgb(169, 234, 254); color: white; padding: 10px;';
    document.body.appendChild(div);
  </script>";}
  
?>
<h1 class="text-center">Inscription</h1>
<form class="col-12 p-5" action="registre.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label" >Adresse Email</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Nom</label>
      <input type="text"  name="nom" class="form-control" id="exampleInputPassword1" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Prénom</label>
        <input type="text" name="prenom" class="form-control" id="exampleInputPassword1" required>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Téléphone</label>
        <input type="text" name="telephone" class="form-control" id="exampleInputPassword1" required>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Adresse</label>
        <input type="text" name="adresse" class="form-control" id="exampleInputPassword1" required>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
        <input type="password" name="mp" class="form-control" id="exampleInputPassword1" required>
      </div>
      <input type="file" name="photo" /></br></br>
    <button type="submit" class="btn btn-primary">Sauvgarder</button>
  </form>
  <?php


?>
  
<!-- footer -->
<footer class="bg-dark text-center p-5 mt-5">
    <p class="text-white">
        tous les droits sont reserves
    </p>
  </footer>
  <script src="js/popper.min.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.7.0.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    

</html>