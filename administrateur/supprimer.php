<?php  
$id=$_GET['id'];
include "../inc/pdo.php";
$req="delete from categorie where id='$id'";
$res=$pdo->exec($req);
if($res){
    header("location:categories.php");
}
?>