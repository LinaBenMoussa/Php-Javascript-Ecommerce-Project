<?php 
include "inc/functions.php";
include "inc/pdo.php";
$visiteur=$_SESSION['id'];
$total=$_SESSION['panier'][1];
$date=date("y-m-d");
$req="insert into panier(visiteur, total,date) values('$visiteur','$total','$date')";
$res=$pdo->exec($req);
$panier_id=$pdo->lastInsertId();
$commandes=$_SESSION['panier'][3];
foreach($commandes as $commande){
    $produit=$commande[4];
    $quantite=$commande[0];
    $date=date("y-m-d");
    $req="insert into commande(quantite,total,panier,produit,date) values('$quantite','$total','$panier_id','$produit','$date')";
    $res=$pdo->exec($req);
}
unset($_SESSION['panier']);
header("location:index.php");
?>