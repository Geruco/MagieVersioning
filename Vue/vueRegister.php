<head>
    <meta charset="UTF-8" />
    <title>Sign UP</title>
    <link href="../css/login.css" rel="stylesheet"/>
</head>
<body>
<div>
    
    <div id="register" class="loginDiv">
        <form  action="../Controleur/register.php" class="logForm" autocomplete="on" method="post"> 
            <h1> Sign up </h1> 
            <p> 
                <input id="usernamesignup" class="put" name="username" required="required" type="text" placeholder="Nom d'utilisateur" />
            </p>
            <p> 
                <input id="emailsignup" class="put" name="mail" required="required" type="email" placeholder="Email ex:mymail@gmail.com"/> 
            </p>
            <p> 
                <input id="passwordsignup" class="put" name="password" required="required" type="password" placeholder="Mot de passe"/>
            </p>
            <p> 
                <input id="passwordsignup_confirm" class="put" name="confirmPassword" required="required" type="password" placeholder="Confirmer le mot de passe"/>
            </p>
            <p> 
                <input id="nomsignup" class="put" name="nom" required="required" type="text" placeholder="Votre nom"/>
            </p>
            <p> 
                <input id="prenomsignup" class="put" name="prenom" required="required" type="text" placeholder="Votre prenom"/>
            </p>
            <p class="signin button"> 
                <button type="submit" id='submit' class="btn btn-primary" value='LOGIN' >Valider</button>
            </p>
            <p class="change_link">  
                Already a member ?
                <a href="#tologin" class="to_register"> Go and log in </a>
            </p>
    
<!--
    <div class="loginDiv">
        <form action="../Controleur/register.php" class="logForm" method="POST">
            <span class="title"> S'inscrire</span>
            <div class="form-group">
                <label><p>Nom d'utilisateur</p></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
            </div>
            <div class="form-group">
                <label><p>Mot de passe</p></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>
            </div>
            <div class="form-group">
                <label><p>Confirmer le mot de passe</p></label>
                <input type="password" placeholder="Confirmer le mot de passe" name="confirmPassword" required>
            </div>
            <div class="form-group">
                <label><p>Adresse mail</p></label>
                <input type="mail" placeholder="Adresse mail" name="mail" required>
            </div>

            <button type="submit" id='submit' class="btn btn-primary" value='LOGIN' >Submit</button>
-->

        <?php
            if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==0){
                    echo "<p style='color:red'>Un problème est survenu, veuillez réessayer.</p>";
                }
                if($err==1){
                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect.</p>";
                }
                if ($err==2){
                    echo "<p style='color:red'>Les mots de passe ne corespondent pas.</p>";
                }
            }
        ?>
        </form>
    </div>
<!--
        </form>

    </div>
-->
</div>
</body>
