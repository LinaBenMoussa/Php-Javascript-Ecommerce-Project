<?php include"../inc/pdo.php";
include "../inc/functions.php";
$categories=getAllCategories();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
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
              <a class="sidebar-link" href="profile.php" aria-expanded="false">
                
                <img src="../assets/icone/user-circle.png" class="me-2 img-hover-blue" style="max-width: 20px;">

                <span class="hide-menu">Profile</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="categories.php" aria-expanded="false">
               <img src="../assets/icone/category.png" class="me-2 img-hover-blue" style="max-width: 20px;">
                <span class="hide-menu">Categories</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="produits/produit.php" aria-expanded="false">
              <img src="../assets/icone/building-store.png" class="me-2 img-hover-blue" style="max-width: 20px;">

                <span class="hide-menu">Produits</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="commandes/commandes.php" aria-expanded="false">
                
                <img src="../assets/icone/6948527.png" class="me-2 img-hover-blue" style="max-width: 20px;">

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
            
  <h1>Liste des Catégories</h1><br>
          <table class="table table-primary">
            <tr>
            <th></th>
              <th>Nom</th>
              <th>Description</th>
              <th></th>
            </tr>
            
            <?php
            $i=0;
             foreach($categories as $categorie){
              $i++;
              print' <tr>
              <td>'.$i.'</td>
              <td>'.$categorie['nom'].'</td>
              <td>'.$categorie['description'].'</td>
              <td>
                <a data-bs-toggle="modal" data-bs-target="#editModal'.$categorie['id'].'" class="btn btn-success">Modifier</a>
                <a href="supprimer.php?id='. $categorie['id'].'" class="btn btn-danger m-1">Supprimer</a>
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
        <h5 class="modal-title">Ajout Categorie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="ajouter.php" method="post">
            <div class="form-group">
              <input type="text" name="nom" class="form-control" placeholder="Nom de Categorie">
            </div>
            <div class="form-group">
              <textarea type="text" name="description" class="form-control" placeholder="description de Categorie"></textarea>
            </div>
          
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
         foreach($categories as $index=>$categorie){?>
            <!-- modifier modal -->
         <div class="modal" id="editModal<?php echo $categorie['id']; ?>" tabindex="-1">
          
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Modifier Categorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form action="modifier.php" method="post">
                  <input type="hidden" value="<?php echo $categorie['id']; ?> " name='idc'>
                    <div class="form-group">
                      <input type="text" name="nom" value="<?php echo $categorie['nom']; ?>" class="form-control" placeholder="Nom de Categorie">
                    </div>
                    <div class="form-group">
                      <textarea type="text" name="description" class="form-control" placeholder="description de Categorie"><?php echo $categorie['description']; ?></textarea>
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
 <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</html>
