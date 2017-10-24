<?php


$date = date('Y-m-d');

?>
<?php App::getInstance()->titre = 'Inscription Roubl\'Actu'; 
?>

<script src="https://www.google.com/recaptcha/api.js"></script>
<div class="row" style="width: 99%;">
<div class="col-md-4"></div>

<div class="col-md-4" id="inscription">
 <h2>Inscription</h2>
 <form action="" method="post" name="formulaire" onsubmit="return verifForm(this)" autocomplete="off">
 	<h3>Pseudonyme</h3>
 	<?php if($errorsNameUse): ?>
 		<h3 style="color: red;">Ce pseudo est déjà utilisé.</h3>
 	<?php endif; ?>
 	<?php if($errorsName): ?>
 		<h3 style="color: red;">Caractère du pseudo invalide.</h3>
 	<?php endif; ?>
 	<input type="text" name="name" placeholder="Votre Pseudo" onblur="verifPseudo(this)" required="required">
 	<h6 style="margin-top: -20px; color: grey;">Caractere autorisé :  Majuscules, minuscules, - , _ </h6> <br>
 	<h3>Adresse mail</h3>
 	<?php if($errorsMail): ?>
 		<h3 style="color: red;">Cette adresse mail n'est pas valide.</h3>
 	<?php endif; ?>
 	<input type="email" required="required" name="mail" placeholder="Votre Mail" onblur="verifMail(this)" data-errormessage='{"valueMissing": "Veuillez entrer une adresse mail valid"'>
 	<h6 style="margin-top: -20px; color: grey; margin-bottom: 50px;">Veuillez saisir une adresse valide, une confirmation vous sera demandé</h6>
 	<h3>Mot de passe</h3>
 	<?php if($errorsMDP): ?>
 		<h3 style="color: red;">Les mots de passes ne correspondent pas</h3>
 	<?php endif; ?>
 	<input type="password" name="password" placeholder="Votre mot de passe" required="required" onblur="verifPassword(this)"><br>
 	<input type="password" name="password_confirm" placeholder="Confirmer votre mot de passe" onblur="identiquePassword(this)" required="required"></br>
 	<h3>Date de naissance</h3>
 	<input type="date" name="date_de_naissance"><br>
 	<input type="hidden" name="date_inscription" value="<?= $date ?>">


 	<div class="g-recaptcha" 
          data-sitekey="6Ld86CYUAAAAADQ3YxoA3bXnR97BkU0LsuT0v4Ei"></div>
 	<button type="submit">Valider</button>
 </form>
 </div>

 </div>


