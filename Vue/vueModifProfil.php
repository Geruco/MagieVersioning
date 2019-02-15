<?php if(session_id() == "") session_start(); ?>
<?php ob_start(); ?>

<!--  Contenu en HTML de la page accueil -->
<?php $header = ob_get_clean(); ?>
<?php ob_start(); ?>

<!--  Contenu en HTML de la page accueil -->
<?php 
foreach ($profils as $profil) { ?>
<div class="div">
    <section>
        <img src="../profilMag/<?php echo $profil['photo']; ?>" class="pdp" />
        <form action="../Controleur/modifProfil.php?action=photo" class="logForm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576" /><input type="file" name="photo" required="required"/>
            <button type="submit" id='sub' class="btn btn-primary">Changer d'image</button>
        </form>
    </section>
    <section>
        <form  action="../Controleur/modifProfil.php" class="logForm" autocomplete="off" method="post"> 
            <h1> Sign up </h1> 
            
            <p> 
                Nom : <input id="nom" class="put" name="nom" required="required" type="text" placeholder="Votre nom" value="<?php echo $profil['nom']; ?>"/>
            </p>
            <p> 
                Prénom : <input id="prenom" class="put" name="prenom" required="required" type="text" placeholder="Votre prenom" value="<?php echo $profil['prenom']; ?>"/>
            </p>
            <p> 
                Ville : <input id="ville" class="put" name="ville" required="required" type="text" placeholder="Ville" value="<?php echo $profil['ville']; ?>"/>
            </p>
            <p> 
                Code postal : <input id="cp" class="put" name="cp" required="required" type="text" placeholder="Code postal" value="<?php echo $profil['cp']; ?>"/>
            </p>
            <p> 
                Téléphone : <input id="tel" class="put" name="tel" required="required" type="text" placeholder="Téléphone" value="<?php echo $profil['tel']; ?>"/>
            </p>
            <p> 
                A propos de vous : <textarea id="APropos" class="put" name="APropos" required="required" type="textarea" placeholder="Description qui sera affichée au public"><?php echo $profil['APropos']; ?></textarea>
            </p>
            Intérèt :
            <select name="interet">
                <option value="0" <?php if($profil['interet'] == 0){ ?>selected ?<?php } ?> >Cours</option>
                <option value="1" <?php if($profil['interet'] == 1){ ?>selected ?<?php } ?>>Représentation</option>
                <option value="2" <?php if($profil['interet'] != 0 && $profil['interet']!= 1){ ?>selected ?<?php } ?>>Les deux</option>
            </select>
            <p class="signin button"> 
                <button type="submit" id='submit' class="btn btn-primary">Valider les changements</button>
            </p>
        </form>
    </section>
</div>
<?php } ?>

<?php $contenu = ob_get_clean(); ?>
<?php require 'templatecalendar.php'; ?>