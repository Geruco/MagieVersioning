<?php if(session_id() == "") session_start(); ?>
<?php ob_start(); ?>

<!--  Contenu en HTML de la page accueil -->
<link href="../css/demande.css" rel="stylesheet"/>
<?php $header = ob_get_clean(); ?>
<?php ob_start(); ?>

<!--  Contenu en HTML de la page accueil -->
<div class="container">
    <div class="row"> 
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
            <div id="my-calendar"></div>
        </div><!--(./col-lg-12 col-md-12 col-sm-12 col-xs-12"BELOW ROW:)-->
    </div><!--(./row)-->
    
<!--    <?php echo $_SESSION['typeRdv']; ?>-->
    
</div><!--(./COntainer")-->


<?php $contenu = ob_get_clean(); ?>
<?php require 'templateCalendar.php'; ?>