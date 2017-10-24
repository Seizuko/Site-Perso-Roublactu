<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'Administrateur' || isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'Rédacteur'  ): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>


	




<?php

$date = date('Y-m-d');
$heure = date("H:i:s");
$app = App::getInstance();
?>


<div class="col-md-1">
	
</div>
<div class="col-md-10"  id="zoneAdmin">
<h2  class="description" style="text-align: center; border-bottom:6px solid  rgb(199,211,29); padding-bottom: 20px; margin-bottom: 20px;">Ajouter un article</h2>
<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="">
	<input class="form-control" type="text" name="titre" value="" placeholder="Nouveau Titre" style="margin-bottom: 20px;">
	<!-- <input type="URL" name="img" placeholder="URL de l'image"  style="margin-bottom: 20px;"> -->
	<input class="form-control" type="file" name="img" value="" style="margin-bottom: 20px;">
	<input type="hidden" name="auteur" value="<?= $_SESSION['Auth']?>">
	<textarea class="form-control ckeditor" name="contenu" placeholder="Contenu Articles" id="editor1" rows="10" cols="80" style="margin-bottom: 20px;"></textarea>
	
    <input type="hidden" name="date_creation" style="color: black; margin-bottom: 20px;" value="<?= $date ?> <?= $heure ?>"><br>
	<input id="buttonActionForum" type="submit" name="" style="margin-bottom: 80px;">
</form>
<a href="/index.php?p=admin.posts.index"  id="buttonAction">Retour vers la page Admin</a>
</div>
<div class="col-md-1">
	
</div>

