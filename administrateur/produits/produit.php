<?php include"../../inc/pdo.php";
include "../../inc/functions.php";
$categories=getAllCategories();
$produits=getAllProducts();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

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
              <a class="sidebar-link" href="produit.php" aria-expanded="false">
              <img src="../../assets/icone/building-store.png" class="me-2 img-hover-blue" style="max-width: 20px;">

                <span class="hide-menu">Produits</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../commandes/commandes.php" aria-expanded="false">
                
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
              <a href="deconnexion.php" target="_blank" class="btn btn-primary">Déconnexion</a>
              
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            
  <h1>Liste des Produits</h1><br>
          <table class="table table-primary">
            <tr>
            <th></th>
              <th>Nom</th>
              <th>Description</th>
              <th>Prix</th>
              <th>Image</th>
              <th>Categorie</th>
              <th></th>
             
            </tr>
            
            <?php
            $i=0;
             foreach($produits as $produit){
              $i++;
              print' <tr>
              <td>'.$i.'</td>
              <td>'.$produit['nom'].'</td>
              <td>'.$produit['description'].'</td>
              <td>'.$produit['prix'].'</td>
              <td><img height="80px" width="80px" src="../../img/'.$produit['image'].'"></td>
              <td>'.$produit['categorie'].'</td>
                <td><div class="btn-group" role="group" aria-label="Actions">
                <a data-bs-toggle="modal" data-bs-target="#editModal'.$produit['id'].'" class="btn btn-success">Modifier</a>
                <a href="supprimer.php?id='. $produit['id'].'" class="btn btn-danger">Supprimer</a>
                </div>
            </td>
            </tr>';
             }
            ?>
          </table>
          <!-- ajout modal -->
          <a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" >Ajouter</a>
         <br>
         <div class="modal" id="myModal" tabindex="-1">
          
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajouter Produit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="ajouter.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <input type="text" name="nom" class="form-control" placeholder="Nom du Produit">
            </div>
            <div class="form-group">
              <textarea type="text" name="desc" class="form-control" placeholder="description du Produit"></textarea>
            </div>
            <div class="form-group">
              <input type="number"  name="prix" class="form-control" placeholder="Prix en DT">
            </div>
            <div class="form-group">
              <input type="file"  name="image" class="form-control" placeholder="Prix en DT">
            </div>
            <div class="form-group">
              <select name="categorie" class="form-control" placeholder="Categorie">
                <?php 
                foreach($categories as $index=>$categorie){
                    print '<option value="'.$categorie['id'].'">'.$categorie['nom'].'</option>';
                }
                ?>
              </select>
            </div>
            <input type="hidden"  value='<?php $_SESSION['id_admin']; ?>' name="createur" class="form-control" placeholder="Prix en DT">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input  type="submit" class="btn btn-primary"  value="Ajouter"  >

      </form>
      </div>
    </div>
  </div>
</div>

         <br>
         <?php
         foreach($produits as $index=>$produit){?>
            <!-- modifier modal -->
         <div class="modal" id="editModal<?php echo $produit['id']; ?>" tabindex="-1">
          
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Modifier Produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              
               
              <form action="modifier.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="<?php echo $produit['id']; ?> " name='idp'>
                    <div class="form-group">
                      <input type="text" name="nom" value="<?php echo $produit['nom']; ?>" class="form-control" placeholder="Nom du Produit">
                    </div>
                    <div class="form-group">
                      <textarea type="text" name="description" class="form-control" placeholder="description du Produit"><?php echo $produit['description']; ?></textarea>
                    </div>
                    <div class="form-group">
                      <input type="number" name="prix" value="<?php echo $produit['prix']; ?>" class="form-control" placeholder="Prix du Produit">
                    </div>
                    <div class="form-group">
                        <img height="100px" width="100px" src="../../img/<?php echo $produit['image']; ?>">
                      <input type="file" name="image"  class="form-control" >
                    </div>
                    <div class="form-group">
                      <select  name="categorie"  class="form-control">
                      <?php 
                    foreach($categories as $index=>$categorie){
                        print '<option name="categorie" value="'.$categorie['id'].'">'.$categorie['nom'].'</option>';
                    }
                    ?>
                    </select>
                    
                    </div>
                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
              </form>
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
