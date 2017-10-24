<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'Administrateur'): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<div class="col-md-2">
	
</div>
<div class="col-md-8" id="zoneAdmin">
<h2 id="modif_article" style="font-size: 2.5em; margin-bottom: 50px; border-bottom:6px solid  rgb(199,211,29); padding-bottom: 20px;">Modifier le commentaire</h2>
<form method="post" action="">
	<input type="hidden" name="id" value="<?= $com->id; ?>">
	<textarea class="form-control" name="commentaire"  style="margin-bottom: 20px; height: 400px;" id="editor1"><?= $com->commentaire; ?></textarea>
	<script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'editor1' );
    </script>
    <br>
	<input id="buttonActionForum" type="submit" name="">
	<br>
	<br>
	<a href="index.php" id="buttonAction">Retour vers la page d'accueil</a>
</form>
</div>
<div class="col-md-4">
	
</div>

