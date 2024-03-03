<?php


        try{
            $pdo = new PDO("mysql:host=localhost;dbname=monoshop", 'root');
          
          }
        catch(PDOException  $e){
          print "Erreur !: " . $e->getMessage() ;
        }
    ?>
    <?php
function getAllCategories(){
    global $pdo;
    $req="select * from categorie";
    $res=$pdo->query($req); 
    $categorie=$res->fetchAll();
    return $categorie;
}
function getAllProducts(){
  global $pdo;
    $req="select * from produits";
    $res=$pdo->query($req); 
    $produits=$res->fetchAll();
    return $produits;
}
function rechProduit($mot) {
  global $pdo;
    $req="select * from produits where nom like '%$mot%'";
    $res=$pdo->query($req); 
    $produits=$res->fetchAll();
    return $produits;
  }
function getProduitById($id){
  global $pdo;
  $req="select * from produits where id='$id'";
  $res=$pdo->query($req); 
  $produit=$res->fetch();
  return $produit;
}
function AddVisiteur($data){
  global $pdo;
  $nom=$data['nom'];
  $prenom=$data['prenom'];
  $email=$data['email'];
  $mp=$data['mp'];
  $telephone=$data['telephone'];
  $adresse=$data['adresse'];
  $photo = $_FILES['photo']['name'];
  $fichierTemp=$_FILES['photo']['tmp_name'];
  move_uploaded_file($fichierTemp, 'uploads/'.$photo );
  $req = "INSERT INTO visiteur (nom, `prénom`, email, MP, telephone, Adresse, photo) VALUES ('$nom','$prenom','$email','$mp','$telephone','$adresse','$photo')";
  $res = $pdo->exec($req);
  if($res)
    return true;
  else
    return false;
}

function getPaniers(){
  global $pdo;
    $req="select p.etat,p.id, p.date, v.nom, v.prénom, v.telephone, p.total from panier p, visiteur v where p.visiteur=v.id";
    $res=$pdo->query($req); 
    $Paniers=$res->fetchAll();
    return $Paniers;
}
function getAllCommandes(){
  global $pdo;
    $req="select p.nom, p.image , c.quantite,c.total,c.panier from commande c, produits p where c.produit = p.id";
    $res=$pdo->query($req); 
    $commandes=$res->fetchAll();
    return $commandes;
}
function changerEtatPanier($data){
  global $pdo;
  $req = "UPDATE panier SET etat='" . $data['etat'] . "' WHERE id=" . $data['panier-id'];
  $res=$pdo->query($req); 
}
function editAdmin($data){
  global $pdo;
  if(!empty($data['pwd']) ){
    $req = "UPDATE administrateur SET nom='" . $data['nom'] . "', email='" . $data['email'] . "', mp='" . $data['pwd'] . "' WHERE id=" . $data['id_ad'];

  } else{
    $req = "UPDATE administrateur SET nom='" . $data['nom'] . "', email='" . $data['email'] . "',  WHERE id=" . $data['id_ad'];

  }
  $res=$pdo->query($req); 

}
function rechProduitCategorie($id){
  global $pdo;
  
      $req="select * from produits where categorie='$id'";
      $res=$pdo->query($req); 
      $produits=$res->fetchAll();
      return $produits;
    }
