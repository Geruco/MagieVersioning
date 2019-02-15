<?php if(session_id() == "") session_start(); ?>
<?php ob_start(); ?>

<!--  Contenu en HTML de la page accueil -->
<?php $header = ob_get_clean(); ?>
<?php ob_start(); ?>

<!--  Contenu en HTML de la page accueil -->
<h3>Ajouter une nouvelle acutalité : </h3>

<form id="actuForm" class="actuForm" method="post" action="../Controleur/CreActu.php" enctype="multipart/form-data">
    <p>Titre : <input id="title" class="put" name="title" required="required" type="text" placeholder="Titre de l'actualité" /></p>
    <p>Contenu : <textarea id="content" class="put" name="contenu" required="required" type="text" placeholder="Lorem Ipsum"></textarea></p>
    <p>Image : <input type="hidden" name="MAX_FILE_SIZE" value="1048576" /><input type="file" name="image" /></p>
    
    <button type="submit" id='submit' class="btn btn-primary" value='Add' >Ajouter aux actualités</button>
    
</form>

<?php $contenu = ob_get_clean(); ?>
<?php require 'template.php'; ?>