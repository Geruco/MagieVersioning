<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link href="../css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../css/login.css" rel="stylesheet"/>
        <link href="../css/main.css" rel="stylesheet"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <title>LeoMagie.fr</title>
    </head>
    <body>
        <div id="global">
            <header>
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
                          <a class="dropdown-item" href="#">Cours</a>
                          <a class="dropdown-item" href="#">Représentation</a>
                        </div>
                      </li>
                      <li class="nav-item ">
                          
                         <?php 
                          if(isset($_GET['connected'])){ 
                            if($_GET['connected']==true){
                          ?>
                          <a class="nav-link" href="Controleur/logout.php?deconnexion=true">Log out</a>
                          <?php }
                          }
                          else{ ?>
                              <a class="nav-link dropdown-toggle" href="#" id="log" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Log In</a>
                                <div class="dropdown-menu" aria-labelledby="log">
                                    <div class="dropdown-item">
                                            
                                            <form action="../Controleur/verification.php" method="POST">
                                                <div class="form-group">
                                                    <label><p>Nom d'utilisateur</p></label>
                                                    <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
                                                </div>
                                                <div class="form-group">
                                                    <label><p>Mot de passe</p></label>
                                                    <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                                                </div>

                                                <button type="submit" id='submit' class="btn btn-primary" value='LOGIN' >Submit</button>
                                                <a href="#">S'inscrire</a>

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
                    </ul>
                  </div>
                </nav>
                <section class="header">
                    <img src="../css/img/icone.png" class="headerImg">
                    <h1 id="title">Magie</h1>
                </section>
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
    </body>
</html>