<?php include"../inc/pdo.php"; ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <h1 class="text-center"> Connexion </h1>
                
                <p class="text-center"></p>
                <form action="authentication-login.php" method="POST">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input name="login" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                    <input name="pwd" type="password" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                
                  </div>
                  <input type="submit" id='submit' class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value='LOGIN'>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Pas de compte ? </p>
                    <a class="text-primary fw-bold ms-2" href="./authentication-register.html">Créez-en un</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
      // Traitement du formulaire de connexion
      if (!empty($_POST)) {
          $login = $_POST['login'];
          $pwd = $_POST['pwd'];

          // Requête SQL pour récupérer les informations de l'utilisateur
          $req = "SELECT * FROM administrateur WHERE email='" . $login . "' AND MP='" . $pwd . "'";
          $res = $pdo->query($req);
          $admin = $res->fetch();

          if (is_array($admin) && !empty($admin)) {
              $_SESSION["email_ad"] = $admin["email"];
              $_SESSION["nom_admin"] = $admin["nom"];
              $_SESSION["id_admin"] = $admin["id"];
              header('Location: profile.php');
              exit;
          } else {
              echo "<div class='noUser'>L’adresse e-mail que vous avez saisie ou le mot de passe n’est pas associé à un compte Admin.</div><a href='registre.php'>Registre ?</a>";
          }
      }
      ?>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>