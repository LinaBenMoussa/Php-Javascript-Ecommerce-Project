<?php 
include "../inc/pdo.php";
if(isset($_SESSION)){
$createur=$_SESSION['id_admin'];}
$id=$_POST['idc'];
$nom=$_POST['nom'];
$desc=$_POST['description'];
$req="update categorie set nom='$nom', description='$desc' where id='$id'";
$res=$pdo->exec($req);
if($res){
    header('location:categories.php');
}
?>