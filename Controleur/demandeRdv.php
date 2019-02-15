<?php
session_start();
if(isset($_SESSION['idMagForm']) && isset($_SESSION['dateForm']) && isset($_POST['Hdebut']) && isset($_POST['MinDebut']) && isset($_SESSION['typeRdv']))
{
// connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'magie';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');

   $idMag = mysqli_real_escape_string($db,htmlspecialchars($_SESSION['idMagForm']));
    $idUser = mysqli_real_escape_string($db,htmlspecialchars($_SESSION['id']));
    $date = mysqli_real_escape_string($db,htmlspecialchars($_SESSION['dateForm']));
    $hDebut = mysqli_real_escape_string($db,htmlspecialchars($_POST['Hdebut'])).":".mysqli_real_escape_string($db,htmlspecialchars($_POST['MinDebut']));
    $duree = mysqli_real_escape_string($db,htmlspecialchars($_POST['duree']));
    $adresse = mysqli_real_escape_string($db,htmlspecialchars($_POST['adresse']));
    $ville = mysqli_real_escape_string($db,htmlspecialchars($_POST['ville']));
    $cp = mysqli_real_escape_string($db,htmlspecialchars($_POST['cp']));
    $nomCli = mysqli_real_escape_string($db,htmlspecialchars($_SESSION['nom']))." ".mysqli_real_escape_string($db,htmlspecialchars($_SESSION['prenom']));
    $tel = mysqli_real_escape_string($db,htmlspecialchars($_POST['tel']));
    $type = mysqli_real_escape_string($db,htmlspecialchars($_SESSION['typeRdv']));
    $details = "0";
    if(isset($_POST['details'])){
     $details = mysqli_real_escape_string($db,htmlspecialchars($_POST['details']));   
    }
    $details = utf8_decode($details);
    

   $requete = "INSERT INTO demande (demande_idMag, demande_idUser, demande_date, demande_Hdebut, demande_duree, demande_adresse, demande_ville, demande_cp, demande_nomCli, demande_status, demande_tel, demande_type, demande_details) VALUES ('".$idMag."', '".$idUser."', '".$date."', '".$hDebut."', '".$duree."', '".$adresse."', '".$ville."', '".$cp."', '".$nomCli."', '0', '".$tel."', '".$type."', '".$details."' )";
   $exec_requete = mysqli_query($db,$requete);

   header('Location: ../index.php');
//    echo $exec_requete;
}
else
{
//   header('Location: ../index.php?action=cours');
    echo "Erreur";
}
mysqli_close($db); // fermer la connexion
?>