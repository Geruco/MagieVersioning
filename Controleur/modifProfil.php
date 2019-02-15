<?php
session_start();

if(isset($_GET['action']) && $_SESSION['status'] >= 1){
    if($_GET['action'] == 'photo'){
        
        // connexion à la base de données
        $db_username = 'root';
        $db_password = '';
        $db_name     = 'magie';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
               or die('could not connect to database');
        
        //GESTION DE L'IMAGE
        $requete = "SELECT mag_photo FROM magicien WHERE id_pseudo = '".$_SESSION['id']."'";
       $exec_requete = mysqli_query($db,$requete);
       foreach($exec_requete as $photo){
            $delPhoto = unlink("../profilMag/".$photo["mag_photo"]);
        }
        $image = "0";
        if ($_FILES['photo']['error'] == 0){
            $target_dir = "profilMag/";
            $target_file = "../".$target_dir.$_SESSION['username'].".jpg";
            move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
            $image = $_SESSION['username'].".jpg";
            echo $image;
        }
        $requete = "UPDATE `magicien` SET `mag_photo` = '".$image."' WHERE `magicien`.`id_pseudo` = ".$_SESSION['id']." ";
        echo $requete;
        $exec_requete = mysqli_query($db,$requete);
        header ('Location: ../index.php?action=profil');
    }
}
elseif(isset($_POST['nom']) && isset($_POST['prenom']) && $_SESSION['status'] >= 1 )
{
    
    // connexion à la base de données
        $db_username = 'root';
        $db_password = '';
        $db_name     = 'magie';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
               or die('could not connect to database');
    
    
    //VARIABLES
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $nom = mysqli_real_escape_string($db,htmlspecialchars($_POST['nom'])); 
    $prenom = mysqli_real_escape_string($db,htmlspecialchars($_POST['prenom']));
    $tel = mysqli_real_escape_string($db,htmlspecialchars($_POST['tel']));
    $ville = mysqli_real_escape_string($db,htmlspecialchars($_POST['ville']));
    $cp = mysqli_real_escape_string($db,htmlspecialchars($_POST['cp']));
    $description = mysqli_real_escape_string($db,htmlspecialchars($_POST['APropos']));
    $description = utf8_decode($description);
    $interet = $_POST['interet'];
    
    
    //INSERT FINAL DANS BDD DU MAGICIEN
    $requete = "UPDATE `magicien` SET `mag_Nom` = '".$nom."', `mag_Prenom` = '".$prenom."', `mag_Ville` = '".$ville."', `mag_CP` = '".$cp."', `mag_Tel` = '".$tel."', `Apropos` = '".$description."', `mag_interet` = '".$interet."' WHERE `magicien`.`id_pseudo` = ".$_SESSION['id']." ";
    $exec_requete = mysqli_query($db,$requete);
    
    $requete = "UPDATE `membres` SET `status` = '1' WHERE `membres`.`id` = ".$id_pseudo;
    $exec_requete = mysqli_query($db,$requete);
    
    
    header('Location: ../index.php?action=profil');
}
else
{
//   header('Location: ../Vue/vueCréActu.php?erreur=0');
    echo "Erreur";
}
mysqli_close($db); // fermer la connexion
?>