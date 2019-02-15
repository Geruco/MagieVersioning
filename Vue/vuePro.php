<?php if(session_id() == "") session_start();
$_SESSION['typeRdv'] = $demande;
?>
<?php ob_start(); ?>
<!--  Contenu en HTML de la page accueil -->
<?php $header = ob_get_clean(); ?>


<?php ob_start(); ?>
<!--  Contenu en HTML de la page accueil -->
<div id="containMagicien">
<?php 
foreach ($pros as $pro) { ?>
    <article class="divMag">
        <a href="../index.php?planning=<?php echo $pro['id']; ?>?demande=<?php echo $_SESSION['typeRdv'];?>">
        <header class="titreMag">
            <h1 ><?php echo $pro['Nom']; ?>
            <span><?php echo $pro['Prenom']; ?></span>
            </h1>
            <p><?php echo $pro['Age']; ?> ans.</p>
        </header>
        <div class="bodyMag">
            <img src="../profilMag/<?php echo $pro['photo']; ?>"/>
            <p class="Apropos"><?php echo $pro['Apropos']; ?></p>
        </div>
        </a>
    </article>
<?php } ?>
    <?php $_SESSION['typeRdv'] = $demande; echo $_SESSION['typeRdv']; ?>
</div>


<?php $contenu = ob_get_clean(); ?>
<?php require 'template.php'; ?>