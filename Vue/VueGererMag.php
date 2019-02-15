<?php if(session_id() == "") session_start(); ?>
<?php ob_start(); ?>

<!--  Contenu en HTML de la page accueil -->
<?php $header = ob_get_clean(); ?>
<?php ob_start(); ?>

<!--  Contenu en HTML de la page accueil -->
<section>
    <form id="magForm" class="magForm" method="post" action="../Controleur/CreMag.php" enctype="multipart/form-data">
        <p>Nom : <input id="nom" class="put" name="nom" required="required" type="text" placeholder="Nom" /></p>
        <p>Prénom : <input id="prenom" class="put" name="prenom" required="required" type="text" placeholder="Prenom" /></p>
        <p>Age : <input id="age" class="put" name="age" required="required" type="text" placeholder="Age" /></p>
        <p>Téléphone : <input id="tel" class="put" name="tel" required="required" type="text" placeholder="Telephone" /></p>
        <p>Adresse : <input id="adresse" class="put" name="adresse" required="required" type="text" placeholder="Adresse" /></p>
        <p>Ville : <input id="ville" class="put" name="ville" required="required" type="text" placeholder="Vile" /></p>
        <p>Code postal : <input id="cp" class="put" name="cp" required="required" type="text" placeholder="Code Postal" /></p>
        <p>Description : <textarea id="description" class="put" name="description" required="required" type="text" placeholder="A propos"></textarea></p>
        <p>Photo : <input type="hidden" name="MAX_FILE_SIZE" value="1048576" /><input type="file" name="photo" required="required"/></p>
        <p>Pseudo utilisateur : <input id="pseudo" class="put" name="pseudo" required="required" type="text" placeholder="Pseudo" /></p>
        <button type="submit" id='submit' class="btn btn-primary" value='Add' >Ajouter ce magicien</button>

    </form>
</section>
<section>
    <p>Suppression :</p>
    <p>Choisissez le magicien à supprimer de la base de donnée :</p>
        <form id="delMag" class="delForm" method="post" action="../Controleur/delMag.php">
            <select name="toDelete">
                <?php 
                    // connexion à la base de données
                $db_username = 'root';
                $db_password = '';
                $db_name     = 'magie';
                $db_host     = 'localhost';
                $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
                       or die('could not connect to database');
                $requete = 'select mag_Id as id, mag_Nom as Nom,'
                    . ' mag_Prenom as Prenom, mag_Age as Age, Apropos as Apropos, mag_photo as photo from magicien'
                    . ' order by mag_Id asc';
                $exec_requete = mysqli_query($db,$requete);

                foreach($exec_requete as $mag){ ?>
                    <option value="<?php echo $mag["Nom"];?>"><?php echo $mag["Nom"]." ".$mag["Prenom"]; ?></option>
                <?php }
                ?>
            </select>
            <p><input id="confirmDel" name="confirmDel" type="checkbox" required="required"/>
            <label for="confirmDel">Je confirme vouloir supprimer ce magicien de la bdd. Cette action est irréversible.</label></p>
            <button type="submit" id='submit' class="btn btn-primary" value='Remove' >Supprimer le magicien</button>
        </form>
</section>

<?php $contenu = ob_get_clean(); ?>
<?php require 'template.php'; ?>