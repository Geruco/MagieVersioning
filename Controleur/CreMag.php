<?php
session_start();
if(isset($_POST['nom']) && isset($_POST['prenom']) && $_SESSION['status'] == 2 )
{
    
    // connexion à la base de données
        $db_username = 'root';
        $db_password = '';
        $db_name     = 'magie';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
               or die('could not connect to database');
    
    $pseudo = mysqli_real_escape_string($db,htmlspecialchars($_POST['pseudo']));
    $requete = "SELECT id FROM membres WHERE pseudo='".$pseudo."'";
    $exec_requete = mysqli_query($db,$requete);
    $reponse = mysqli_fetch_array($exec_requete);
    $id_pseudo = $reponse['id'];
    
    //VARIABLES
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $nom = mysqli_real_escape_string($db,htmlspecialchars($_POST['nom'])); 
    $prenom = mysqli_real_escape_string($db,htmlspecialchars($_POST['prenom']));
    $age = mysqli_real_escape_string($db,htmlspecialchars($_POST['age']));
    $tel = mysqli_real_escape_string($db,htmlspecialchars($_POST['tel']));
    $adresse = mysqli_real_escape_string($db,htmlspecialchars($_POST['adresse']));
    $ville = mysqli_real_escape_string($db,htmlspecialchars($_POST['ville']));
    $cp = mysqli_real_escape_string($db,htmlspecialchars($_POST['cp']));
    $description = mysqli_real_escape_string($db,htmlspecialchars($_POST['description']));
    $description = utf8_decode($description);
    
    //GESTION DE L'IMAGE
    $image = "0";
    if ($_FILES['photo']['error'] == 0){
        $target_dir = "profilMag/";
        $target_file = "../".$target_dir.basename($nom).".jpg";
        $chemin = "magicien/{$nom}.png";
        move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
        $image = $nom.".jpg";
    }
    
    //INSERT FINAL DANS BDD DU MAGICIEN
    $requete = "INSERT INTO magicien ( mag_Nom, mag_Prenom, mag_Age, mag_Ville, mag_CP, mag_Tel, Apropos, id_pseudo, mag_photo, mag_interet) VALUES ('".$nom."', '".$prenom."','".$age."','".$ville."','".$cp."', '".$tel."', '".$description."', '"."$id_pseudo"."', '".$image."', '2' )";
    $exec_requete = mysqli_query($db,$requete);
    
    $requete = "UPDATE `membres` SET `status` = '1' WHERE `membres`.`id` = ".$id_pseudo;
    $exec_requete = mysqli_query($db,$requete);
    
    
    header('Location: ../index.php?action=CréMag');
}
else
{
   header('Location: ../Vue/vueCréActu.php?erreur=0');
}
mysqli_close($db); // fermer la connexion
?>