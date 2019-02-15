<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password'])&& isset($_POST['confirmPassword']) && isset($_POST['mail'])&& isset($_POST['nom']) && isset($_POST['prenom']) )
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
    $nom = mysqli_real_escape_string($db,htmlspecialchars($_POST['nom']));
    $prenom = mysqli_real_escape_string($db,htmlspecialchars($_POST['prenom']));
    $confirmPassword = mysqli_real_escape_string($db,htmlspecialchars($_POST['confirmPassword']));
    $mail = mysqli_real_escape_string($db,htmlspecialchars($_POST['mail']));
    
    if($password == $confirmPassword) {
        $password = password_hash(mysqli_real_escape_string($db,htmlspecialchars($_POST['password'])), PASSWORD_DEFAULT);

        if($username !== "" && $password !== "")
        {
            $requete = "INSERT INTO membres (pseudo, pass, nom, prenom email, date_inscription, status) VALUES ('".$username."', '".$password."', '".$nom."', '".$prenom."', '".$mail."', NOW(), '0')";
            $exec_requete = mysqli_query($db,$requete);

    //        Verification de l'enregistrement
            $requete = "SELECT count(*) FROM membres where pseudo = '".$username."';";
            $exec_requete = mysqli_query($db,$requete);
            $repCount      = mysqli_fetch_array($exec_requete);
            $count = $repCount['count(*)'];
            if ($count == 1){
                header('Location: ../Controleur/login.php');
            }
            else{
                header('Location: ../Vue/vueRegister.php?erreur=0'); //Une erreur est arrivée avec la requête
            }
        }
        else
        {
           header('Location: ../Vue/vueRegister.php?erreur=1'); // utilisateur ou mot de passe vide
        }
    }
    else {
        header('Location: ../Vue/vueRegister.php?erreur=2'); //Mot de passes ne correspondent pas
    }
}
else
{
   header('Location: ../Vue/vueRegister.php?erreur=0');
}
mysqli_close($db); // fermer la connexion
?>