
<?php
function Verifier_sessionAdmin(){
    if( !isset($_SESSION["id_admin"])){
        header("location:authentication-login.php");
    }
}
?>