<?php include "../inc/pdo.php"; 
include "../inc/functions.php";
if(isset($_POST['btn'])){
   editAdmin($_POST);
}
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
            <h1>Profile</h1><br><br>
          <?php //echo $_SESSION['email_ad']; ?>
          <div class="container">
          <h1>Nom : <span class="text-primary"><?php echo $_SESSION['nom_admin']; ?></span> </h1>
          <h1>Email : <span class="text-primary"><?php echo $_SESSION['email_ad']; ?></span></h1><br>
          <a data-bs-toggle="modal" data-bs-target="#profilEdit" class="btn btn-primary">Modifier</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- modal modifier -->
  <div class="modal" id="profilEdit" tabindex="-1">
          
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Modifier Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form action="profile.php" method="post"><br>
              <input type="hidden" value="<?php echo $_SESSION['id_admin']; ?>" name="id_ad">
                  <input type="text" name="nom" class="form-control"  value="<?php echo $_SESSION['nom_admin']; ?>"><br>
                  <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['email_ad']; ?>"><br>
                  <input type="password" name="pwd" placeholder="mot de passe" class="form-control">
                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="btn" class="btn btn-primary">Modifier</button>
              </form>
              </div>
            </div>
          </div>
        </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>
