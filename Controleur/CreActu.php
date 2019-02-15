<?php
session_start();
if(isset($_POST['title']) && isset($_POST['contenu']) && $_SESSION['status'] == 2 )
{
    $image = "0";
    //GESTION DE L'IMAGE
    if ($_FILES['image']['error'] == 0){
        $target_dir = "actualites/";
        $target_file = "../".$target_dir.basename($_FILES["image"]["name"]);
        $chemin = "actualites/{$nom}.png";
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image = $target_file;
    }
    
    
    // connexion à la base de données
        $db_username = 'root';
        $db_password = '';
        $db_name     = 'magie';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
               or die('could not connect to database');
    
   // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $title = mysqli_real_escape_string($db,htmlspecialchars($_POST['title'])); 
    $date = mysqli_real_escape_string($db,htmlspecialchars($_POST['date']));
    $content = mysqli_real_escape_string($db,htmlspecialchars($_POST['contenu']));
    $content = utf8_decode($content);
    $requete = "INSERT INTO actualites (actu_date, actu_titre, actu_contenu, actu_image, actu_ordre) VALUES (NOW(), '".$title."', '".$content."', '".$image."', '0')";
    $exec_requete = mysqli_query($db,$requete);
    
    header('Location: ../index.php?action=actus');
}
else
{
   header('Location: ../Vue/vueCréActu.php?erreur=0');
}
mysqli_close($db); // fermer la connexion
?>