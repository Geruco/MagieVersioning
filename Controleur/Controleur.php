<?php
require 'Modele.php';


//FONCTION GLOBALE
function accueil() {
    require 'Vue/vueAccueil.php';
}

function erreur ($mgErreur){
    require 'Vue/vueErreur.php';
}

function pro($type){
    $pros = getPros($type);
    $demande = $type;
    require 'Vue/vuePro.php';
}

function actualites(){
    $actus = getActu();
    require 'Vue/vueActualites.php';
}

function calendar($id){
    require 'Vue/vueCalendrier.php';
}

//FONCTION POUR MAGICIEN ET / OU ADMIN
function CréActu(){
    require 'Vue/vueCreActu.php';
}

function CréMag(){
    require 'Vue/vueGererMag.php';
}

function consultDemandeMag($id){
    $demandes = getDemandesMag($id);
    require 'Vue/vueDemandeMag.php';
}

function loadProfil($id){
    $profils = getProfil($id);
    require 'Vue/vueModifProfil.php';
}

//FONCTION POUR UTILISATEUR

function consultDemande($id){
    $demandes = getDemandesU($id);
    require 'Vue/vueDemandes.php';
}

