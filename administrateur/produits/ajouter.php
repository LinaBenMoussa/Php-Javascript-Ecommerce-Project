<?php 
include "../../inc/pdo.php";
$nom=$_POST['nom'];
$desc=$_POST['desc'];
$prix=$_POST['prix'];
$createur=$_POST['createur'];
$categorie=$_POST['categorie'];
$target_dir = "../../img/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $image=$_FILES["image"]["name"];
} else {
    echo "Sorry, there was an error uploading your file.";
  }

if(isset($_SESSION)){
  $createur=$_SESSION['id_admin'];}
  
  
  $req="insert into produits(nom, description,prix,image,categorie,createur) values('$nom','$desc','$prix','$image','$categorie','$createur')";
  $res=$pdo->exec($req);
  if($res){
      header('location:produit.php');
  }
 
?>