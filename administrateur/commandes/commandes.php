<?php include"../../inc/pdo.php";
include "../../inc/functions.php";
if(isset($_POST['btnSubmit'])){
$id=$_POST['panier-id'];
changerEtatPanier($_POST);
}
$commandes=getAllCommandes();
$paniers=getPaniers();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <link rel="shortcut icon" type="image/png" href="../../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
          <h1 class="text-primary">MonoShop</h1>

          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
           
          
            <li class="sidebar-item">
              <a class="sidebar-link" href="../profile.php" aria-expanded="false">
                
                <img src="../../assets/icone/user-circle.png" class="me-2 img-hover-blue" style="max-width: 20px;">

                <span class="hide-menu">Profile</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../categories.php" aria-expanded="false">
               <img src="../../assets/icone/category.png" class="me-2 img-hover-blue" style="max-width: 20px;">
                <span class="hide-menu">Categories</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../produits/produit.php" aria-expanded="false">
              <img src="../../assets/icone/building-store.png" class="me-2 img-hover-blue" style="max-width: 20px;">

                <span class="hide-menu">Produits</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="commandes.php" aria-expanded="false">
                
                <img src="../../assets/icone/6948527.png" class="me-2 img-hover-blue" style="max-width: 20px;">

                <span class="hide-menu">Commandes</span>
              </a>
            </li> 
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <a href="../deconnexion.php" target="_blank" class="btn btn-primary">Déconnexion</a>
              
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            
  <h1>Liste des Paniers</h1><br>
          <table class="table table-primary">
            <tr>
            <th></th>
              <th>Client</th>
              <th>Total</th>
              <th>Date</th>
              <th>Etat</th>
              <th></th>
              
            </tr>
            
           <?php

            $i=0;
            if(is_array($paniers)){
             foreach($paniers as $panier){
              $i++;
              print' <tr>
              <td>'.$i.'</td>
              <td>'.$panier['prénom'].' '.$panier['nom'].'</td>
              <td>'.$panier['total'].'DT</td>
              <td>'.$panier['date'].'</td>
              <td>'.$panier['etat'].'</td>
             
              <td>
              <div class="btn-group" role="group" aria-label="Actions">
                <a data-bs-toggle="modal" data-bs-target="#commandes'.$panier['id'].'" class="btn btn-success">Afficher</a>
                <a data-bs-toggle="modal" data-bs-target="#traiter'.$panier['id'].'"  class="btn btn-warning">Traiter</a>
                </div>
            </td>
            </tr>';
             }}
            ?> 
          </table>
          <!-- traiter modal -->
          <?php
         foreach($paniers as $index=>$panier){
            ?>
            
         <div class="modal" id="traiter<?php echo $panier['id']; ?>" tabindex="-1">
          
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Traiter la Commande</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="commandes.php" method="post">
                    <div class="form-group">
                        <input type="hidden" value="<?php echo $panier['id']; ?>" name="panier-id">
                    <select name="etat" class="form-control">
                        <option value="en livraison">En livraison</option>
                        <option value="livraison terminee">livraison terminée</option>
                    </select></div><br>
                    <div class="form-group">
                    <button type="submit" name="btnSubmit" class="btn btn-primary">Sauvegarder</button>

                    </div>
                </form>
              </div></div></div></div>
                <?php }?>
          <!--fin traiter modal -->
          <?php
         foreach($paniers as $index=>$panier){?>
            <!--  modal commandes -->
         <div class="modal" id="commandes<?php echo $panier['id']; ?>" tabindex="-1">
          
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Liste des Commandes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <table class="table">
                    <thread>
                        <tr>
                            <th>Nom produit</th>
                            <th>Image</th>
                            <th>Quantité</th>
                            <th>Total</th>
                            
                           
                        </tr>
                    </thread>
                    <tbody>
                        <?php 
                        foreach($commandes as $index=>$c){
                            if($c['panier']==$panier['id']){
                            print'<tr>
                                <td>'.$c["nom"].'</td>
                                <td><img width="100" height="100" src="../../img/'.$c['image'].'"</td>
                                <td>'.$c["quantite"].'</td>
                                <td>'.$c["total"].'</td>
                                
                                
                            </tr>';}
                        }  
                        ?>
                </tbody>
          </table>
        </div>
      </div>
    </div>
         </div>
<?php
}
?>
          
 
</body>
 <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/js/sidebarmenu.js"></script>
  <script src="../../assets/js/app.min.js"></script>
  <script src="../../assets/libs/simplebar/dist/simplebar.js"></script>
</html>
