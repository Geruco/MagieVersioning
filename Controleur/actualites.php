<?php

require_once 'Modele.php';

class Actualite extends Modele {
    public function getActu() {
       $sql = 'select actu_id as id, actu_date as date,'
                . ' actu_titre as titre, actu_contenu as contenu from actualites, actu_image as image'
                . ' order by actu_id desc';
        $actualites = $this->executeRequete($sql);
        return $actualites;
    }
    

//    public function getBillet($idBillet) {
//        $sql = 'select BIL_ID as id, BIL_DATE as date,'
//                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
//                . ' where BIL_ID=?';
//        $billet = $this->executeRequete($sql, $idBillet);
//        if ($billet->rowCount() == 1){
//            return $billet->fetch();
//        }
//        else {
//            throw new Exception ("Pas de Billet avec l'ID ".$idBillet);
//        }
//    }

}
