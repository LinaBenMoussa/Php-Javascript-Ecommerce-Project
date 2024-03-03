<?php
include "inc/pdo.php";
/* récupération des données du formulaire */
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$num= $_POST['num'];
$email = $_POST['email'];
$adresse = $_POST['adresse'];
$id=$_SESSION["id"];
  
$sql = "UPDATE visiteur SET nom = :nom, prénom = :prenom, email = :email, telephone = :num, Adresse = :adresse WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':nom', $nom);
$stmt->bindValue(':prenom', $prenom);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':adresse', $adresse);
$stmt->bindValue(':id', $id);
$stmt->bindValue(':num', $num);
$stmt->execute();
header('location:index.php');




?>



 