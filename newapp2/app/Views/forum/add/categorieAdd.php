<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'Administrateur'): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<div class="col-md-2">

</div>

<div class="col-md-8" id="zoneAdmin">
<h2  class="description" style="text-align: center; border-bottom:6px solid  color: red; padding-bottom: 20px; margin-bottom: 20px;">Créer une catégorie</h2>
<form method="post">
	<input type="hidden" name="id" value="">
	<input class="form-control" type="text" name="titre" placeholder="Titre de la catégorie" style="margin-bottom: 20px;">
	<input id="buttonActionForum" type="submit" name="" style="margin-bottom: 80px;">
</form>
</div>
<div class="col-md-2">

</div>