<?php if(session_id() == "") session_start();
$_SESSION['idMagForm'] = $mag;
$_SESSION['dateForm'] = $date;
?>
<?php ob_start(); ?>
<!--  Contenu en HTML de la page accueil -->
<?php $header = ob_get_clean(); ?>
<?php ob_start(); ?>

<!--  Contenu en HTML de la page accueil -->

<form id="rdvForm" class="rdvForm" method="post" action="../Controleur/demandeRdv.php" >
    <p>Magicien : <input id="nom" class="put" name="idMag" disabled type="text" value="<?php echo $mag; ?>" /></p>
    <p>Date : <input id="date" class="put" name="date" disabled type="text" value="<?php echo $date; ?>" /></p>
    <p>Horaire de début : <select name="Hdebut"><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select> heures <select name="MinDebut"><option value="00">00</option><option value="05">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select> minutes</p>
    <p>Durée : <select name="duree"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select> Heures</p>
    Lieu* :
    <ul>
        <li>Adresse : <input id="adresse" class="put" name="adresse" required type="text"/></li>
        <li>Ville : <input id="ville" class="put" name="ville" required type="text"/></li>
        <li>Code postal : <input id="cp" class="put" name="cp" required type="text"/></li>
        <li>Telephone : <input id="tel" class="put" name="tel" required type="text"/></li>
    </ul>
    <p>Détails supplémentaires que vous voulez apporter (thème, demande particulière...) : <textarea name="details"></textarea> </p>
<!--<p>Votre nom : <input id="nomCli" class="put" name="nomCli" required type="text"/></p>-->
    
    <button type="submit"onclick="return confirm('Confirmer l'envoi de la demande ?');">Soumettre</button>
</form>
<?php $contenu = ob_get_clean(); ?>
<?php require 'templateCalendar.php'; ?>