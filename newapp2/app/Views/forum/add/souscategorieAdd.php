<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'Administrateur'): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<div class="col-md-2">

</div>

<div class="col-md-8" id="zoneAdmin">
<h2  class="description" style="text-align: center; border-bottom:6px solid  color: red; padding-bottom: 20px; margin-bottom: 20px;">Créer une sous-catégorie</h2>
<form method="post">
	<input type="hidden" name="id" value="">
	<input class="form-control" type="text" name="titre" placeholder="Titre de la sous-catégorie" style="margin-bottom: 20px;">
	<input class="form-control" type="text" name="description" value="" placeholder="Description" style="margin-bottom: 20px;">
	<h5>Choisissez dans quel catégorie voulez-vous qu'elle apparaisse ?</h5>
	<select name="titre_cat_id" id="selectAdmin">
	<?php foreach ($catAdd as $cat) : ?>
		<option value="<?=$cat->id?>"><?=$cat->titre?></option>
	<?php endforeach; ?>
	</select>
	<input id="buttonActionForum" type="submit" name="" style="margin-bottom: 80px;">
</form>
</div>

<div class="col-md-2">

</div>