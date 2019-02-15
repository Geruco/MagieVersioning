<?php ob_start(); ?>
<div class="loginDiv">
    <form action="verification.php" class="logForm" method="POST">
        <div class="form-group">
            <label><p>Nom d'utilisateur</p></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
        </div>
        <div class="form-group">
            <label><p>Mot de passe</p></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>
        </div>

        <button type="submit" id='submit' class="btn btn-primary" value='LOGIN' >Submit</button>

    <?php
        if(isset($_GET['erreur'])){
            $err = $_GET['erreur'];
            if($err==1 || $err==2){
                echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
            }else if($err == "connect"){
                echo "<p style='color:red'>Vous devez être connecté pour continuer</p>";
            }
        }
    ?>
    </form>

</div>
<?php $contenu = ob_get_clean(); ?>
<?php require '../Vue/template.php'; ?>