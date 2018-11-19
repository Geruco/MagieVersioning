<?php ob_start(); ?>

<!--  Contenu en HTML de la page accueil -->
<section class="accueil">
    <div>
        <strong>Bonjour et bienvenue, <br/> </strong>
        <p>Je suis un jeune magicien de 20 ans, je vous fais partager ma passion pour la magie, le mentalisme et la "triche", toujours accompagné de mon fidèle jeu de cartes.</p>
        <p>Je vous propose de voir de la magie de près, sous vos yeux, et de vous laisser aller le temps d'un soir.</p>
        <p>Bienvenue dans mon monde...</p>
    </div>
    <div>
        <img src="../css/img/section1.jpg" />
    </div>
</section>
<section class="accueil">
    <div>
        <img src="../css/img/costard.jpg"/>
    </div>
    <div>
        <p>N'hésitez pas à aller voir sur Facebook ou Instagram pour quelques tours exclusifs et quelques informations, ou dans la rubrique actualité.
            Dans la rubrique contact vous pouvez me contacter et / ou remplir le formulaire en ligne .</p>
        <p><strong>Qui suis-je?</strong></p>
        <p>Je suis un magicien de Close-Up. "Mais qu'est ce que c'est?" me direz vous...
        <p><strong>Le Close-Up</strong>s'oppose à la magie de scène ou de salon, pour faire simple c'est une magie déambulatoire qui se fait sous les yeux des spectateurs, dans les mains du magicien mais surtout dans les mains du spectateur. </p>
            <p>Je ne pratique quasiment que ce type de magie car il permet à mon public d’interagir avec moi durant le tour, ce qui a bien souvent un effet mémorable pour le spectateur, mais surtout c'est une magie qui convient beaucoup plus aux adultes qui ne seraient pas prêts au premier abord à se poser devant un spectacle d'une heure de magie. En effet un tour de close up ne dure généralement que 5 minutes.</p>
        <p>Et vous n'imaginez pas le nombre de personnes qui ne veulent être "dérangés" que 5 minutes, et qui après le premier tour en redemandent encore et encore, jusqu’à finalement passer presque une heure à regarder des tours différents car ils ne voient plus le temps passer.</p>
    </div>
</section>
<section class="accueil">
    <div>
        <p><strong>Pourquoi engager un magicien de Close-Up?</strong></p>
        <p>L’avantage du Close-Up est de créer un Spectacle de magie de qualité et percutant sans être envahissant. Il se passe toujours quelque chose à une table ou une autre. Mais l’atout majeur de la magie de proximité est de faciliter les contacts entre vos invités, de briser la glace, de détendre l’atmosphère. Un vrai plus lorsque le plan de table regroupe des gens qui ne se connaissent pas ou peu…</p>
        <p>De plus il permet aux gens de se rappeler de votre soirée, car le close up permet aux spectateurs de repartir avec leur carte signée, ou souvent un petit souvenir d'un des tours (pièce signée, carte déchirée, brûlée, pliée et encore bien d'autres).</p>
    </div>
    <div>
        <img class="img3" src="../css/img/section3.jpg"/>
    </div>
</section>
<section class="accueil">
    <div>
        <img class="img4" src="../css/img/section4.jpg"/>
    </div>
    <div>
        <p><strong>Les regroupements :</strong></p>
        <p>Pour se renouveler, apprendre, et discuter, les magiciens ont des clubs, des associassions...
        Je suis membre du club de magie de Haute Savoie, et j'ai eu la chance, ces trois dernières années, de pouvoir rencontrer quelques grands noms de la magie le temps d'une soirée ce qui m'a considérablement aidé à améliorer mes tours.</p>
        <p>Tout mon parcours aurait été impossible sans mon ami et modèle <a class="dhtgD" href="http://www.google.com/url?q=http%3A%2F%2Fwww.robindevillemagicien.com&amp;sa=D&amp;sntz=1&amp;usg=AFQjCNGEtpJjWA2K_j4NpADypyx8U7cCYA" target="_blank">Robin Deville</a></p>
    </div>
</section>
<footer id="footer">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="https://www.facebook.com/leodouillardmagie/" target="_blank"><img class="footerIcone" src="../css/img/iconeFB.png"></a>
          <a class="nav-item nav-link"href="https://www.instagram.com/leo_douillard/" target="_blank"><img class="footerIcone" src="../css/img/iconeInsta.pg.png"></a>
          <a class="nav-item nav-link" href="#">Pricing</a>
        </div>
      </div>
    </nav>
</footer>
<?php $contenu = ob_get_clean(); ?>
<?php require 'template.php'; ?>
