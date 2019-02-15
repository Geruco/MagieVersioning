<?php

$bdd;
    
function executeRequete($sql, $params=null){
        if ($params == null) {
            $resultat = getBdd()->query($sql);
        }
        else {
            $resultat = getBdd()->prepare($sql);
            $resultat->execute($params);
        }
        return($resultat);
    }

 function getBdd() {
//        if (bdd == NULL){
            $bdd = new PDO('mysql:host=localhost;dbname=magie;charset=utf8', 'root', '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
//        }
        return $bdd;
    }
    

function getActu() {
   $sql = 'select actu_id as id, actu_date as date,'
            . ' actu_titre as titre, actu_contenu as contenu, actu_image as image, actu_ordre as ordre from actualites'
            . ' order by actu_ordre desc, actu_date desc, actu_id desc';
    $actualites = executeRequete($sql);
    return $actualites;
}

function getPros($type) {
    $sql = 'select mag_Id as id, mag_Nom as Nom,'
            . ' mag_Prenom as Prenom, mag_Age as Age, Apropos as Apropos, mag_photo as photo from magicien'
            . ' where mag_interet = "'.$type.'" or mag_interet = 2 order by mag_Nom asc';
    $pro = executeRequete($sql);
    return $pro;
}

function getDemandesMag($id){
    $sql = 'select mag_id as id from magicien where id_pseudo = "'.$id.'" ';
    $magic = executeRequete($sql);
    foreach($magic as $magi){
        $mag = $magi['id'];
    }
    $sql = 'select demande_id as id, demande_date as date, demande_Hdebut as Hdebut, demande_duree as duree, demande_adresse as adresse, demande_ville as ville, demande_cp as cp, demande_nomcli as nomcli, demande_status as status,demande_tel as tel, demande_type as type, demande_details as details'
        .' from demande'
        .' where demande_idMag = "'.$mag.'" order by demande_status, demande_id desc';
    $demandes = executeRequete($sql);
    return $demandes;
}

function getDemandesU($id){
    $sql = 'select demande_id as id, demande_date as date, demande_Hdebut as Hdebut, demande_duree as duree, demande_adresse as adresse, demande_ville as ville, demande_cp as cp, demande_nomcli as nomcli, demande_status as status,demande_tel as tel, demande_type as type, demande_details as details'
        .' from demande'
        .' where demande_idUser = "'.$id.'" order by demande_status asc, demande_id desc';
    $demandes = executeRequete($sql);
    return $demandes;
}


function getProfil($id){
    $sql = 'select mag_Nom as nom, mag_Prenom as prenom, mag_Ville as ville, mag_CP as cp, mag_Tel as tel, Apropos as APropos, mag_interet as interet, mag_photo as photo from magicien where id_pseudo = "'.$id.'" ';
    $profil = executeRequete($sql);
    return $profil;
}