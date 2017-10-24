<?php if(isset($_SESSION['Auth'])): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<?php
$date = date('Y-m-d');
$heure = date("H:i:s");
 ?>

<div class="col-md-2">
	
</div>
<div class="col-md-8"  id="zoneAdmin">
<h2  class="description" style="text-align: center; border-bottom:6px solid  color: red; padding-bottom: 20px; margin-bottom: 20px;">Crée un sujet</h2>

<?php foreach ($lastId as $last) : ?>
<?php $req = $last->id + 1 ?>
<?php endforeach; ?>

<form method="post">
	<input type="hidden" name="id" value="">
	<input type="hidden" name="auteur" value="<?= $_SESSION['Auth'] ?>">
	<input type="hidden" name="categorie_id" value="<?= $_GET['idC'] ?>">
	<input class="form-control" type="text" name="titre" value="" placeholder="Titre du sujet" style="margin-bottom: 20px;">
	<input type="hidden" name="users_id" value="<?= $_SESSION['Id'] ?>">
	<input type="hidden" name="categorie_sms_id" value="<?= $_GET['idC'] ?>">
	<input type="hidden" name="sujet_id" value="<?=$req?>">
	<input type="hidden" name="auteur" value="<?= $_SESSION['Auth']?>">
	<input type="hidden" name="date_creation" value="<?= $date?> <?= $heure ?>">
	<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'Administrateur'): ?>
		<textarea class="form-control ckeditor" name="message" placeholder="Ajouter votre message" >
		</textarea>
	<?php else : ?>
		<noscript>Veuillez activer JavaScript pour écrire un commentaire</noscript>
		<script>
			document.write('<textarea class="form-control" name="message" id="Users" placeholder="Ajouter votre message" ></textarea>');
		</script>
	<?php endif; ?>
	<br>
	<input id="buttonActionForum" type="submit" name="" style="margin-bottom: 80px;">
</form>
</div>
<div class="col-md-2">
</div>