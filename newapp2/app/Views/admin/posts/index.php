<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'Administrateur' || isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'Rédacteur'  ): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<div class="row" style="width: 99%">
<div class="col-md-2"></div>

<div class="col-md-8" id="zoneAdmin">


<h1 style="font-size: 4em; margin-bottom: 50px; border-bottom:6px solid  rgb(199,211,29);">Editez vos articles !</h1>


<table class="table">
	<thead>
		<tr>
			<td class="description">ID</td>
			<td class="description">TITRE</td>
			<td class="description">ACTION</td>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($posts as $postArt) : ?>
		<tr>
		<td><?= $postArt->id; ?></td>
		<td  class="action"><?= $postArt->titre; ?></td>
		<td><a href="/index.php?p=admin.posts.single&idA=<?=$postArt->id;?>" ><button class="btn btn-danger">edit</button>
		<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'Administrateur') : ?>
		<form method="post" action="/index.php?p=admin.posts.delete" style="display: inline-block;">
			<input type="hidden" name="id" value="<?= $postArt->id; ?>">
			<input class="btn btn-danger" type="submit" name="OK" value="Delete">
		</form>
		<?php else : ?>
		<?php endif; ?>
			</a>
		</td>


		</tr>
	<?php endforeach; ?>
	</tbody>
</table>


</div>