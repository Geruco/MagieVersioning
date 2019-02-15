<?php if(session_id() == "") session_start();

require 'Controleur/Controleur.php';

try {                           // Essai s'il n'y a pas d'erreur 
    if (isset($_GET['action'])){    // vérification 'action présente dans l'URL
        if ($_GET['action']=='actus') { //si action = actus
            actualites();
        }
        
        elseif($_GET['action']=='CréActu'){
            CréActu();
        }
        elseif($_GET['action']=='CréMag'){
            CréMag();
        }
        
        elseif($_GET['action']=='cours'){
//            $_SESSION['typeRdv'] = 0;
            pro(0);
        }
        elseif($_GET['action']=='representation'){
//            $_SESSION['typeRdv'] = 1;
            pro(1);
        }
        
        elseif($_GET['action']=='profil'){
            if(isset($_SESSION['connected'])){ 
                if($_SESSION['connected']==true){
                    if($_SESSION['status'] >= 1){
                       loadProfil($_SESSION['id']);
                    } else accueil();
                }else accueil();
            }else accueil();
        }
        elseif($_GET['action']=='RDV' && isset($_GET['date']) && isset($_GET['idMag'])){
            if(isset($_SESSION['connected'])){ //Si connecté continue sinon retour acceueil
                if($_SESSION['connected']==true){  
                    $date = $_GET['date'];
                    $mag = $_GET['idMag'];
                    require 'Vue/vuePriseRDV.php';
                }else {
                    accueil();
                }
            }else {
                accueil();
            }
        }
        else
            throw new Exception("Action non valide");
    }
    elseif(isset($_GET['planning'])){
        if(isset($_SESSION['connected'])){ 
            if($_SESSION['connected']==true){
                $id = $_GET['planning'];
                calendar($id);
            }else {
                header('Location: ../Controleur/login.php?erreur=connect');
            }
        }else {
            header('Location: ../Controleur/login.php?erreur=connect');
        }
    }
    
    //  DEMANDE MAGICIEN
    elseif(isset($_GET['consultMag'])){
        if(isset($_SESSION['connected'])){ 
            if($_SESSION['connected']==true){
                if($_SESSION['status'] >= 1){
                   consultDemandeMag($_SESSION['id']);
                } else accueil();
            }else accueil();
        }else accueil();
    }
    
    // DEMANDE GENERALE
    elseif(isset($_GET['consultDmd'])){
        if(isset($_SESSION['connected'])){
            if($_SESSION['connected'] == true){
                consultDemande($_SESSION['id']);
            }
        }
    }
    else {
        accueil();  // action par défaut                
    }
}
catch (Exception $e){           // En cas d'erreur récupération de l'exception qui a été levée
    $msgErr = $e->getmessage(); // récupération du message d'erreur
}