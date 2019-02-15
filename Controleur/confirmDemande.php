<?php
session_start();
if(isset($_GET['valide']) && isset($_GET['id']) && $_SESSION['status'] >= 1 )
{
    
    $choix = $_GET['valide'];
    $id = $_GET['id'];
    //Recupération de l'id et de la prioritté voulue grâce à la value de l'option choisis composée comme tel : id-priorité
    
    // connexion à la base de données
        $db_username = 'root';
        $db_password = '';
        $db_name     = 'magie';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
               or die('could not connect to database');

    $requete = "UPDATE demande SET demande_status = ".$choix." WHERE demande.demande_id = ".$id;
    $exec_requete = mysqli_query($db,$requete);
    
    header('Location: ../index.php?consultMag');
}
elseif(isset($_GET['annuler']) && isset($_GET['id'])){
    $id = $_GET['id'];
    //Recupération de l'id et de la prioritté voulue grâce à la value de l'option choisis composée comme tel : id-priorité
    
    // connexion à la base de données
        $db_username = 'root';
        $db_password = '';
        $db_name     = 'magie';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
               or die('could not connect to database');

    $requete = "UPDATE demande SET demande_status = '3' WHERE demande.demande_id = ".$id;
    $exec_requete = mysqli_query($db,$requete);
    
    header('Location: ../index.php?consultDmd');
}
else
{
   header('Location: ../index.php');
}
mysqli_close($db); // fermer la connexion
?>