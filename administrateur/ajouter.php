<?php 
include "../inc/pdo.php";
if(isset($_SESSION)){
$createur=$_SESSION['id_admin'];}
$nom=$_POST['nom'];
$desc=$_POST['description'];
$req="insert into categorie(nom, description,createur) values('$nom','$desc',$createur)";
$res=$pdo->exec($req);
if($res){
    header('location:categories.php');
}
?>