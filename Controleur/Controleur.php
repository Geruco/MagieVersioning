<?php
require 'Modele.php';

function accueil() {
    require 'Vue/vueAccueil.php';
}

function actualites(){
    
    $actus = getActu();
    require 'Vue/vueActualites.php';
}
function erreur ($mgErreur){
    require 'Vue/vueErreur.php';
}

if (isset($_GET['action'])){    // vérification 'action présente dans l'URL
        if ($_GET['action']=='billet') {
            actualites();
        }
}