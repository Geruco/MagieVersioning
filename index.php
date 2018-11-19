<?php

require 'Controleur/Controleur.php';

try {                           // Essai s'il n'y a pas d'erreur 
    if (isset($_GET['action'])){    // vérification 'action présente dans l'URL
        if ($_GET['action']=='actus') { //si action = billet
//            if (isset($_GET['id'])) {
//                $idBillet = intval($_GET['id']);
//                if ($idBillet != 0) {
//                    billet($idBillet);
//                else
//                    throw new Exception("Identifiant de billet non valide");
//            }
//            else
//                throw new Exception("Identifiant de billet non défini");
            actualites();
        }
        else
            throw new Exception("Action non valide");
    }
    else {
        accueil();  // action par défaut                
    }
}
catch (Exception $e){           // En cas d'erreur récupération de l'exception qui a été levée
    $msgErr = $e->getmessage(); // récupération du message d'erreur
}