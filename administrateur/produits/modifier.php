<?php 
include "../../inc/pdo.php";
$id=$_POST['idp'];
$nom=$_POST['nom'];
$desc=$_POST['description'];
$prix=$_POST['prix'];
$categorie=$_POST['categorie'];
$image=$_FILES['image']['name'];
if (!empty($_FILES['image']['name'])) {
$target_dir = "../../img/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $image=$_FILES["image"]["name"];
} }

if(isset($_SESSION)){
  $createur=$_SESSION['id_admin'];}
  
  if(!empty($_FILES['image']['name'])){
  $req="update produits set nom='$nom' ,description='$desc',prix='$prix',image='$image',categorie='$categorie',createur='$createur' where id='$id'";}
  else{
    $req="update produits set nom='$nom' ,description='$desc',prix='$prix',categorie='$categorie',createur='$createur' where id='$id'";
}

  $res=$pdo->exec($req);
  if($res){
      header('location:produit.php');
  }
  header('location:produit.php');