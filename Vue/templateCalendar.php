<?php if(session_id() == "") session_start();  ?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link href="../css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../css/vuePro.css" rel="stylesheet"/>
<!--        <link href="../css/login.css" rel="stylesheet"/>-->
        <link href="../css/main.css" rel="stylesheet"/>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        
        <?php if(isset($header)){
            echo $header;
        } ?>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/calendrier.js"></script>
        <title>LeoMagie.fr</title>
    </head>
    <body>
        <div id="global">
            <header id="header">
                <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
                  <a class="navbar-brand" href="../index.php"><img src="../css/img/icone.png" class="logo"></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Accueil <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="../index.php?action=actus">Actualités</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="contact" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Contact
                        </a>
                        <div class="dropdown-menu" aria-labelledby="contact">
                          <a class="dropdown-item" href="../index.php?action=cours">Cours</a>
                          <a class="dropdown-item" href="../index.php?action=representation">Représentation</a>
                        </div>
                      </li>
                      <li class="nav-item ">
                          
                         <?php 
                          if(isset($_SESSION['connected'])){ 
                            if($_SESSION['connected']==true){
                          ?>
<!--                          <span>Status : <?php echo $_SESSION['status']; ?></span>-->
                          <a class="nav-link" href="Controleur/logout.php?deconnexion=true">Se déconnecter</a>
                          <?php }
                          }
                          else{ ?>
                              <a class="nav-link dropdown-toggle" href="#" id="log" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Se connecter</a>
                                <div class="dropdown-menu" aria-labelledby="log">
                                    <div id="logForm" class="dropdown-item">
                                            
                                            <form action="../Controleur/verification.php" method="POST">
                                                <div class="form-group">
                                                    <label><p>Nom d'utilisateur</p></label>
                                                    <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
                                                </div>
                                                <div class="form-group">
                                                    <label><p>Mot de passe</p></label>
                                                    <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                                                </div>

                                                <button type="submit" id='submit' class="btn btn-primary" value='LOGIN' >Envoyer</button>
                                                <a href="../Vue/vueRegister.php">S'inscrire</a>

                                            <?php
                                                if(isset($_GET['erreur'])){
                                                    $err = $_GET['erreur'];
                                                    if($err==1 || $err==2)
                                                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                                                }
                                            ?>
                                            </form>

                                    </div>
                                </div>
                          <?php } ?>

                        </li>
                        
                        
<!--                        LIEN POUR GERER LES COMPTES MAGICIENS-->
                        <?php 
                          if(isset($_SESSION['connected'])){ 
                            if($_SESSION['connected']==true){
                                if($_SESSION['status'] == 2){
                          ?>
                        <li class="nav-item">
                          <span>Status : <?php echo $_SESSION['status']; ?> - Admin</span>
                          <a class="nav-link" href="../index.php?action=CréMag">Gérer les comptes "Magicien"</a>
                        </li>
                        
                        <li class="nav-item">
                          <span>Status : <?php echo $_SESSION['status']; ?> - Admin</span>
                          <a class="nav-link" href="../index.php?action=CréActu">Créer des actualités</a>
                        </li>
                        
<!--                        LIEN POUR GERER LES DEMANDES DES MAGICIENS-->
                          <?php }
                                elseif($_SESSION['status'] == 1){ ?>
                        
                        <li class="nav-item">
                          <span>Status : <?php echo $_SESSION['status']; ?> - Magicien</span>
                          <a class="nav-link" href="../index.php?consultMag">Consulter mes demandes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php?action=profil">Modifier mon profil</a>
                        </li>
                        
                        <?php }
                            }
                          } ?>
<!--                        LIEN POUR GERER LES DEMANDES UTILISATEURS-->
                        <?php 
                          if(isset($_SESSION['connected'])){ 
                            if($_SESSION['connected']==true){
                                if($_SESSION['status'] == 0){
                          ?>
                                <a class="nav-link" href="../index.php?consultDmd">Voir l'état de mes demandes</a>
                            <?php }
                                }
                          } ?>
                        
                        
                        
                        
                    </ul>
                  </div>
                </nav>
            </header>
            <section>
            <div id="contenu">
                <!-- tester si l'utilisateur est connecté -->
<!--
            <?php
                session_start();
                if(isset($_SESSION['username'])){
//                         session_start();
                    if($_SESSION['username'] !== ""){
                        $user = $_SESSION['username'];
                        // afficher un message
                        echo "Bonjour $user, vous êtes connecté";
                    }
                }
                else {
                    echo "Vous n'êtes pas connectés";
                }
            ?>
-->

                <?php echo $contenu
                ?>
            </div> <!-- #contenu -->
            </section>
        </div> <!-- #global -->
        
        <footer id="footer">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
              <a class="navbar-brand" href="#"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-item nav-link" href="https://www.facebook.com/leodouillardmagie/" target="_blank"><img class="footerIcone" src="../css/img/iconeFB.png"></a>
                  <a class="nav-item nav-link"href="https://www.instagram.com/leo_douillard/" target="_blank"><img class="footerIcone" src="../css/img/iconeInsta.pg.png"></a>
                </div>
              </div>
            </nav>
        </footer>
    </body>
</html>