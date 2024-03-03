<nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary-subtle">
      

      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">MonoShop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
           
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categories
              </a>
              <ul class="dropdown-menu">
                <?php 
                $totalCategories = count($categories);
                foreach($categories as $index => $categorie){
                  echo "<li><a class='dropdown-item' href='index.php?id=" . $categorie['id'] . "'>" . $categorie['nom'] . "</a></li>";


                  if ($index < $totalCategories - 1) {
                    echo'<li><hr class="dropdown-divider"></li>';
                  }
                
                }
                ?>
              </ul>
            </li>
            
          </ul>
          <form class="d-flex" action="index.php" method="post" role="search">
            <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="search" name="search">
            <button class="btn btn-outline-success" type="submit">Rechercher</button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             <img class="icone" src='img/utilisateur.png'>  
              </a>
              <ul class="dropdown-menu">
              <?php
    if(isset($_SESSION['nom']) && isset($_SESSION['prenom'])){
      $nom = $_SESSION['nom'];
      $prenom = $_SESSION['prenom'];
      echo "<li><a class='dropdown-item' href='profil.php'>".$nom." ".$prenom."</a></li>";
      echo "<li><a class='dropdown-item' href='deconnexion.php'>Déconnexion</a></li>";
    } else {
      echo "<li><a class='dropdown-item' href='connexion.php'>Connexion</a></li>";
      echo "<li><a class='dropdown-item' href='registre.php'>Inscription</a></li>";
    }
    ?>
                
              </ul>
            </li>
               
            
                  <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="panier.php">Panier</a>
                  </li>
                </ul>
            </div>
          </form>
        </div>
      </div>
    </nav>  
    <style>
      .icone{
        width: 30px;
        height: 30px;
      }
    </style>