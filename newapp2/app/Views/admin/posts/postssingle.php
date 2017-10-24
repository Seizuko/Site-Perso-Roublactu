<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'Administrateur' || isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'Rédacteur'): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<?php
	$app = App::getInstance();
	$app->titre = $postArt->titre;
?>



<div class="col-md-1">
	
</div>
<div class="col-md-10" id="zoneAdmin">
<h2 id="modif_article" style="font-size: 2.5em; margin-bottom: 50px; border-bottom:6px solid  rgb(199,211,29); padding-bottom: 20px;">Modifier votre article</h2>
<form method="post">
	<input type="hidden" name="id" value="<?= $postArt->id; ?>">
	<input class="form-control" type="text" name="titre" value="<?= $postArt->titre; ?>" style="margin-bottom: 20px;">
	<textarea class="form-control ckeditor" name="contenu"  style="margin-bottom: 20px; height: 400px;" id="editor1"><?= $postArt->contenu; ?></textarea>
	<script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'editor1' );
    </script>
    </br>
	<button id="buttonActionForum" type="submit" name="">Valider </button></br><br>
	<a href="/index.php?p=admin.posts.index" id="buttonAction">Retour vers la page Admin</a>
</form>
</div>