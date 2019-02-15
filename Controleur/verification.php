<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
   
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'magie';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    $requete = "SELECT pass FROM membres where 
              pseudo = '".$username."'";
    $exec_requete = mysqli_query($db,$requete);
    $reponse      = mysqli_fetch_array($exec_requete);
    $passVerif = $reponse['pass'];
    
    if($username !== "" && password_verify($password, $passVerif))
    {
//        $requete = "SELECT count(*) FROM membres where 
//              pseudo = '".$username."'";
//        $exec_requete = mysqli_query($db,$requete);
//        $reponse      = mysqli_fetch_array($exec_requete);
//        $count = $reponse['count(*)'];
//        if($count!=0) // nom d'utilisateur et mot de passe correctes
//        {
            //Recuperation du statut de l'utilisateur
            $requete = "SELECT status, id, nom, prenom FROM membres where 
                  pseudo = '".$username."'";
            $exec_requete = mysqli_query($db,$requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $Status = $reponse['status'];
            $id = $reponse['id'];
            $nom = $reponse['nom'];
            $prenom = $reponse['prenom'];
            
           $_SESSION['username'] = $username;
            $_SESSION['connected'] = true;
            $_SESSION['status'] = $Status;
            $_SESSION['id'] = $id;
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
           header("location:" . $_SERVER['HTTP_REFERER']);
//        }
//        else
//        {
//           header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
//        }
    }
    else
    {
       header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: login.php');
}
mysqli_close($db); // fermer la connexion
?>