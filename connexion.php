<?php
include "inc/pdo.php";
include "inc/functions.php";
$categories = getAllCategories();
$produits = getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="style/style.css">
</head>

  <?php include 'inc/header.php'; ?>
  <div id="container">
    <form class="form" action="connexion.php" method="POST">
      <h1>Connexion</h1>
      <label><b>Nom d'utilisateur</b></label>
      <input type="text" placeholder="Entrer le nom d'utilisateur" name="login" required>

      <label><b>Mot de passe</b></label>
      <input type="password" placeholder="Entrer le mot de passe" name="pwd" required>
      <input type="submit" id='submit' value='LOGIN'>
      <?php
      // Traitement du formulaire de connexion
      if (!empty($_POST)) {
          $login = $_POST['login'];
          $pwd = $_POST['pwd'];

          // Requête SQL pour récupérer les informations de l'utilisateur
          $req = "SELECT * FROM visiteur WHERE email='" . $login . "' AND MP='" . $pwd . "'";
          $res = $pdo->query($req);
          $user = $res->fetch();

          if (!empty($user)) {
              $_SESSION["connecte"] = "1";
              $_SESSION["nom"] = $user["nom"];
              $_SESSION["prenom"] = $user["prénom"];
              $_SESSION["id"] = $user["id"];
              header('Location: index.php');
              exit;
          } else {
              echo "<div class='noUser'>L’adresse e-mail que vous avez saisie ou le mot de passe n’est pas associé à un compte.</div><a href='registre.php'>Registre ?</a>";
          }
      }
      ?>
    </form>
  </div>

</html>
