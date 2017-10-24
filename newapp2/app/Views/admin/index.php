<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'Administrateur' || isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'Rédacteur'  ): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<div class="row" style="width: 99%">
<div class="col-md-2"></div>

<div class="col-md-8" id="zoneAdmin">
	<div id="titre_admin">
		<h1>Panel <?=$utilisateurs->membre_rang?></h1>
		<?php if(isset($_SESSION['Auth'])): ?>
	        <h4 id="hello_admin">Bonjour <?= $_SESSION['Auth']; ?></h4>
	        <p id="hello_admin">Soyez le bienvenue sur votre espace d'administration !</p>
	        <?php else : ?>
	        <h4 id="hello_admin"> Vous êtes déconnecter.</h4>
	        <?php endif; ?>
	</div>
	<div class="row">
		<?php if($utilisateurs->membre_rang == 'Administrateur' || $utilisateurs->membre_rang == 'Rédacteur'): ?>
		<div class="col-md-4" style="min-height: 150px;">
			<p class="action">Ajouter un nouvel article !</p>
			<a href="/index.php?p=admin.posts.add" id="buttonAction">Let's go !</a>
		</div>

		<div class="col-md-4" style="min-height: 150px;">
			<p class="action">Editer votre article ou supprimer le.</p>
			<a href="/index.php?p=admin.posts.postIndex" id="buttonAction">Let's go !</a>
		</div>
		<?php else : ?><?php endif; ?>
		<?php if($utilisateurs->membre_rang == 'Administrateur'): ?>
		<div class="col-md-4" style="min-height: 150px;">
			<p class="action">Liste des utilisateurs :D</p>
			<a href="/index.php?p=admin.users.index" id="buttonAction">Let's go !</a>
		</div>

		<div class="col-md-4" style="min-height: 150px;">
			<p class="action">Ajouter une nouvelle photo de profil</p>
			<a href="/index.php?p=admin.users.image" id="buttonAction">Let's go !</a>
		</div>
		<div class="col-md-4" style="min-height: 150px;">
			<p class="action">Statistiques du site</p>
			<a href="https://analytics.google.com/analytics/web/?authuser=1#realtime/rt-overview/a101518633w148741902p153623513/" id="buttonAction" target="_blank">Let's go !</a>
		</div>
		<div class="col-md-4" style="min-height: 150px;">
			<p class="action">Sujets Invisible</p>
			<a href="/index.php?p=admin.sujetsInvisible.sujetsInvisible" id="buttonAction">Let's go !</a>
		</div>
		<?php else : ?><?php endif; ?>
	</div>
</div>


</div>