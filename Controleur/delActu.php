<?php
session_start();
if($_SESSION['status'] == 2 && isset($_GET['id']))
{
    // connexion à la base de données
        $db_username = 'root';
        $db_password = '';
        $db_name     = 'magie';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
               or die('could not connect to database');
    
   if(isset($_GET['id'])){
       $id = $_GET['id'];
       
       $requete = "SELECT actu_image FROM actualites WHERE actu_id = '".$id."'";
       $exec_requete = mysqli_query($db,$requete);
       foreach($exec_requete as $photo){
           if($photo["actu_image"] !== 0){
               $delPhoto = unlink($photo["actu_image"]);
           }
        }
       
       $requete = "DELETE FROM actualites WHERE actu_id = ".$id;
       $exec_requete = mysqli_query($db,$requete);
       
       header('Location: ../index.php?action=actus');
   }
    else header('Location: ../login.php');
}
else
{
   header('Location: ../index.php');
}
mysqli_close($db); // fermer la connexion
?>