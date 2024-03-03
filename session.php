
<?php
function Verifier_session(){
    if( !isset($_SESSION["connecte"])){
        header("location:connexion.php");
        
    }
}
?>