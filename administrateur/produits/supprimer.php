<?php  
$id=$_GET['id'];
include "../../inc/pdo.php";
$req="delete from produits where id='$id'";
$res=$pdo->exec($req);
if($res){
    header("location:produit.php");
}
?>