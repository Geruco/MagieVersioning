<?php ob_start(); ?>

<!--  Contenu en HTML de la page accueil -->
<?php 
foreach ($actus as $actualite) { ?>
<article class="divActu">
    <header class="titreActu">
        <h1 ><?php echo $actualite['titre']; ?></h1>
        <time><?php echo $actualite['date']; ?></time>
    </header>
    <div class="bodyActu">
        <p><?php echo $actualite['contenu']; ?></p>
    </div>
</article>
<?php } ?>

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
<?php $contenu = ob_get_clean(); ?>
<?php require 'template.php'; ?>
