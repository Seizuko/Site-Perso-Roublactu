<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'Administrateur'): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<?php
	$app = App::getInstance();
	$app->titre = $editSujet->titre;
?>



<div class="col-md-1">
	
</div>
<div class="col-md-10" id="zoneAdmin">
<h2 id="modif_article" style="font-size: 2.5em; margin-bottom: 50px; border-bottom:6px solid  rgb(199,211,29); padding-bottom: 20px;">Modifier le nom du sujet</h2>
<form method="post">
	<input type="hidden" name="id" value="<?= $editSujet->id; ?>">
	<input class="form-control" type="text" name="titre" value="<?= $editSujet->titre; ?>" style="margin-bottom: 20px;">
    </br>
	<button id="buttonActionForum" type="submit" name="">Valider </button>
</form>
</div>

