<?php
session_start();
if($_SESSION['status'] == 2 && isset($_POST['toDelete']))
{
    // connexion à la base de données
        $db_username = 'root';
        $db_password = '';
        $db_name     = 'magie';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
               or die('could not connect to database');
    
   if(isset($_POST['toDelete'])){
       $nom = $_POST['toDelete'];
       
       $requete = "UPDATE `membres` SET `status` = '0' WHERE `membres`.`id` =  `magicien`.`id_pseudo` AND `magicien`.`mag_Nom` = '".$nom."'";
       $exec_requete = mysqli_query($db,$requete);
       
       $requete = "SELECT mag_photo FROM magicien WHERE mag_Nom = '".$nom."'";
       $exec_requete = mysqli_query($db,$requete);
       foreach($exec_requete as $photo){
            $delPhoto = unlink("../profilMag/".$photo["mag_photo"]);
        }
       
       $requete = "DELETE FROM magicien WHERE mag_Nom = '".$nom."'";
       $exec_requete = mysqli_query($db,$requete);
       
       header('Location: ../index.php?action=CréMag');
   }
    else header('Location: ../index.php');
}
else
{
   header('Location: ../index.php');
}
mysqli_close($db); // fermer la connexion
?>