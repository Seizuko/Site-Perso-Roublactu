<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'Administrateur'): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<div class="row" style="width: 99%">
<div class="col-md-1"></div>

<div class="col-md-10" id="zoneAdmin">
 <h2 style=" border-bottom:6px solid  rgb(199,211,29); padding-bottom: 10px;">Liste de tout les utilisateurs</h2>

 <table class="table col-md-10">
	<thead>
		<tr>
			<th class="description" style="text-align: center;">Photo de Profil</th>
			<th class="description" style="text-align: center;">Pseudo</th>
			<th class="description" style="text-align: center;">Age</th>
			<th class="description" style="text-align: center;">Adresse Mail</th>
			<th class="description" style="text-align: center;">Date d'inscription</th>
			<th class="description" style="text-align: center;">Rang</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($user as $utilisateur): ?>
			<tr>
				<td><img style="width: 50px;" src="img/imageProfil/<?= $utilisateur->image ?>"></td>
				<td><?= $utilisateur->name ?></td>
				<td><?= $utilisateur->age ?></td>
				<td><?= $utilisateur->mail ?></td>
				<td><?= $utilisateur->date_inscription ?></td>
				<td><?= $utilisateur->membre_rang ?>
				<form action="" method="post">
					<input type="hidden" name="id" value="<?=$utilisateur->id?>">
					<select name="membre_rang" id="selectAdmin">
						<option value="Administrateur">Administrateur</option>
						<option value="Modérateur">Modérateur</option>
						<option value="Rédacteur">Rédacteur</option>
						<option value="Inscrit">Inscrit</option>
					</select>
					<button type="submit" value="" id="buttonActionForum">Valider</button>
				</form></td>
				<td>
					<form action="index.php?p=admin.users.delete" method="post">
						<button id="buttonActionForum" type="submit" value="<?=$utilisateur->id?>" name="id">DELETE</button>
					</form>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
</div>

<div class="col-md-1"></div>