 
<?php
include "inc/functions.php";
 include "inc/pdo.php";
include "session.php";
Verifier_session();


$visiteur= $_SESSION['id'];
$image=$_POST['image'];
$nom=$_POST['nom'];
$id_prod=$_POST["produit"];
$quantite=$_POST["quantite"];

$req="SELECT prix FROM produits where id='$id_prod'";

$res= $pdo->query($req);
$produit=$res->fetch();
$prix=$produit['prix'];
$total=intval($quantite) * intval($prix);
if(!isset($_SESSION['panier'])){
$_SESSION['panier']=array($visiteur,0,$prix,array());}
$_SESSION['panier'][1]+=$total;
$_SESSION['panier'][3][]=array($quantite,$total,$nom,$image,$id_prod);
header("location:panier.php");
 ?>   