<?php
   session_start();

            try{
                $pdo = new PDO("mysql:host=localhost;dbname=monoshop", 'root');
              
              }
            catch(PDOException  $e){
              print "Erreur !: " . $e->getMessage() ;
            }
        ?>
