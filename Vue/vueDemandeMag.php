<?php if(session_id() == "") session_start(); ?>
<?php ob_start(); ?>

<!--  Contenu en HTML deu header-->
<link href="../css/demande.css" rel="stylesheet"/>
<?php $header = ob_get_clean(); ?>
<?php ob_start(); ?>

<!--  Contenu en HTML de la page-->
<?php 
foreach ($demandes as $demande) { ?>
<article class="divActu">
    <header class="titreDemande">
        <h2><?php if($demande['type'] == 0){echo "Cours";}elseif($demande['type'] == 1){echo "Représentation";} ?></h2>
        <time><?php echo $demande['date']; ?></time>
        <?php 
            if(isset($demande['status'])){
//                         session_start();
                if($demande['status'] == 0){
                    // afficher un message ?>
                    <p class="enAttente">En attente</p>
                <?php }
                elseif($demande['status'] == 1){
                    // afficher un message ?>
                    <p class="confirmer">Accepté</p>
                <?php }
                elseif($demande['status'] == 2){
                    // afficher un message ?>
                    <p class="refuser">Refusé</p>
        <?php
                }
                 elseif($demande['status'] == 3){
                    // afficher un message ?>
                    <p class="annuler">Annulé</p>
                <?php }
            } ?>
    </header>
    <div class="bodyDemande">
        <p>Demandé par  <span class="strong"><?php echo ucfirst($demande['nomcli']); ?></span> pour une durée de <?php echo $demande['duree']; ?> heures.</p>
        <ul class="liste">
            <li><span class="strong">Horaire de début :</span><?php echo $demande['Hdebut']; ?></li>
            <li><span class="strong">Ville :</span> <?php echo ucfirst($demande['ville']); ?></li>
            <li><span class="strong">Code postal :</span> <?php echo $demande['cp']; ?></li>
            <li><span class="strong">Adresse :</span> <?php echo $demande['adresse']; ?></li>
        </ul>
        <p><span class="strong">Téléphone :</span> <?php echo wordwrap($demande['tel'],2," ",1); ?></p>
        <p><span class="strong">Détails supplémentaires :</span> <?php echo nl2br($demande['details']); ?></p>
<!--        <p><?php echo nl2br($actualite['contenu']); ?></p>-->
    </div>
    
    <?php 
            if(isset($demande['status'])){
//                         session_start();
                if($demande['status'] == 0){
                    // afficher un message ?>
    <div class="confirmDiv">
        <a href="../Controleur/confirmDemande.php?valide=1&id=<?php echo $demande['id']; ?>">Accepter</a>
        <a href="../Controleur/confirmDemande.php?valide=2&id=<?php echo $demande['id']; ?>">Refuser</a>
    </div>
    <?php } } ?>
</article>
<?php } ?>

<?php $contenu = ob_get_clean(); ?>
<?php require 'templatecalendar.php'; ?>