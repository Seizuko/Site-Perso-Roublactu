<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'Administrateur') : ?>
<?php elseif($_SESSION['Auth'] == $editMessage->auteur) : ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<div class="col-md-1">
	
</div>
<div class="col-md-10" id="zoneAdmin">
<h2 id="modif_article" style="font-size: 2.5em; margin-bottom: 50px; border-bottom:6px solid  rgb(199,211,29); padding-bottom: 20px;">Modifier le message</h2>
<form method="post">
	<input type="hidden" name="id" value="<?= $editMessage->id; ?>">
	<?php if(isset($_SESSION['Auth']) && $utilisateurs->membre_rang == 'Administrateur'): ?>
		<textarea class="form-control ckeditor" name="message" placeholder="Ajouter votre message" ><?= $editMessage->message; ?></textarea>
	<?php else : ?>
		<textarea class="form-control" name="message" id="Users" placeholder="Ajouter votre message" ><?= $editMessage->message; ?></textarea>
		</script>
	<?php endif; ?>
    </br>
	<button id="buttonActionForum" type="submit" name="">Valider </button>
</form>
</div>

