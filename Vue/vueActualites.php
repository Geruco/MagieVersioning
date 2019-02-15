<?php if(session_id() == "") session_start(); ?>
<?php ob_start(); ?>

<!--  Contenu en HTML de la page accueil -->
<!--<link href="../css/demande.css" rel="stylesheet"/>-->
<?php $header = ob_get_clean(); ?>
<?php ob_start(); ?>

<!--  Contenu en HTML de la page accueil -->
<?php 
foreach ($actus as $actualite) { ?>
<article class="divActu">
    <header class="titreActu">
        <h1 ><?php echo $actualite['titre']; ?></h1>
        <?php 
        if($actualite['ordre'] == 1){
        ?>
        <span><img class="fireImg" src="../css/img/carte.jpg" /></span>
        <?php } ?>
        <time><?php echo $actualite['date']; ?></time>
        
        <?php 
            if(isset($_SESSION['status'])){
//                         session_start();
                if($_SESSION['status'] == 2){
                    // afficher un message ?>
                    <a href="../Controleur/delActu.php?id=<?php echo $actualite['id'] ?>">Supprimer</a>
        <?php
                }
            }
            if(isset($_SESSION['status'])){
//                         session_start();
                if($_SESSION['status'] == 2){
                    // afficher un message ?>
                    <form action="../Controleur/ordreActu.php" method="post">
                        <select name="prio">
                            <option value="<?php echo $actualite['id'] ?>-0" <?php if($actualite['ordre'] == 0){ ?> selected <?php } ?> >Non-prioritaire</option>
                            <option value="<?php echo $actualite['id'] ?>-1" <?php if($actualite['ordre'] == 1){ ?> selected <?php } ?> >Prioritaire</option>
                        </select>
                        <input type="submit" class="submitOrder" value="Confirmer le changement de priorité" />
                    </form>
        <?php
                }
            } ?>
        
    </header>
    <div class="bodyActu">
        <?php if($actualite['image'] !== "0"){
        ?>
        <image id="image" class="actu_img" src="<?php echo $actualite['image'] ?>"> </image>
        <?php } ?>
        
        <p><?php echo nl2br($actualite['contenu']); ?></p>
    </div>
</article>
<?php } ?>

<?php $contenu = ob_get_clean(); ?>
<?php require 'template.php'; ?>
