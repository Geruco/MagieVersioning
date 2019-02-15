<?php
session_start();
if(isset($_POST['prio']) && $_SESSION['status'] == 2 )
{
    
    $prio = $_POST['prio'];
    $id = explode("-", $prio)[0];
    $priority = explode("-", $prio)[1];
    //Recupération de l'id et de la prioritté voulue grâce à la value de l'option choisis composée comme tel : id-priorité
    
    // connexion à la base de données
        $db_username = 'root';
        $db_password = '';
        $db_name     = 'magie';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
               or die('could not connect to database');

    $requete = "UPDATE actualites SET actu_ordre = ".$priority." WHERE actualites.actu_id = ".$id;
    $exec_requete = mysqli_query($db,$requete);
    
    header('Location: ../index.php?action=actus');
}
else
{
   header('Location: ../index.php?action=actus');
}
mysqli_close($db); // fermer la connexion
?>