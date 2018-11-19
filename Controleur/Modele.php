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
            . ' actu_titre as titre, actu_contenu as contenu from actualites'
            . ' order by actu_id desc';
    $actualites = executeRequete($sql);
    return $actualites;
}