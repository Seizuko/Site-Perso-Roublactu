<?php
	App::getInstance()->titre = 'Dofus Actualité - Forum Roubl\'Actu';
	if(isset($_SESSION['Auth'])){
$utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']);
}
?>

<div class="row">

	<div class="col-md-1"></div>


	<div class="col-md-8" id="zoneForum">
		<div class="row">
			<div class="col-md-12 titleForum" style="height: 100px;"><h1>Forum Roubl'Actu</h1></div>

			<?php foreach ($titre_categorie as $titre_cat) : ?>
			<div class="col-xs-5 col-sm-5 col-md-6 col-lg-6 categoryForum"><h4><?= $titre_cat->titre ?></h4></div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 categoryForum" style="text-align: center;"><h4>Sujets</h4></div>

			<div class="col-xs-5 col-sm-5 col-md-4 col-lg-4 categoryForum"><h4>Derniers messages</h4></div>

			<?php foreach (App::getInstance()->getTable('Categorie')->cat($titre_cat->id) as $cat) : ?>
				<?php foreach (App::getInstance()->getTable('Categorie')->nbSmsCat($cat->id) as $nbSmsCat) :?>
					<?php foreach (App::getInstance()->getTable('sujet')->nbSujetCat($cat->id) as $nbSujet) :?>
					<div class="row">
						<div id="borderSujetForum"></div>
						<div class="col-xs-5 col-sm-5 col-md-6 col-lg-6 paddingForum"><a href="<?= $cat->Url ?>" id="sujetForum"><p><?= $cat->titre ?></p></a>	<p class="descriptionSujet"><?= $cat->description ?></p></div>
						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 paddingForum" style="text-align: center;"><p><?=$nbSujet->nbSujetCat?></p></div>

						<?php if(($nbSujet->nbSujetCat) > 0) : ?>
						<?php foreach (App::getInstance()->getTable('message')->lastByMessageCat($cat->id) as $sms) : ?>
							<div class="col-xs-5 col-sm-5 col-md-2 col-lg-3 paddingForum">
								<p><?= $sms->date_creation_fr ?> </br> By <?= $sms->auteur ?></p>
							</div>
						<?php endforeach; ?>
						<?php else : ?>
						<div class="col-xs-5 col-sm-5 col-md-2 col-lg-3 paddingForum">
							<p>Aucun Message</p>
						</div>
						<?php endif; ?>
						<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 paddingForum">
						<?php if(isset($_SESSION['Auth']) && $utilisateurs->membre_rang == 'Administrateur'): ?>
						<form action="<?= $cat->UrlCat ?>" method="post" id="deleteSujetForum">
							<button title="Editer une catégorie" type="submit" id="buttonActionForum" value="<?=$cat->id?>"
							name="id" style="float: right;">...</button>
						</form>
						<?php else : ?><?php endif; ?>
					</div>
					</div>
					<?php endforeach; ?>
					<?php endforeach; ?>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</div>
		<?php if(isset($_SESSION['Auth'])){
			$utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']);
			} ?>

			<?php if(isset($_SESSION['Auth']) && $utilisateurs->membre_rang == 'Administrateur'): ?>
			<div class="col-md-12" style="height: 130px; margin-top: 30px;"><button  id="sujetCreatForum"><a href="/index.php?p=forum.createCat.categorieAdd">Créer une catégorie</a></button>
			<button  id="sujetCreatForum"><a href="/index.php?p=forum.createsousCat.souscategorieAdd">Créer une sous-catégorie</a></button></div>
			<?php else : ?>
			<?php endif; ?>
	</div>
	<div class="col-md-2"  id="colonne-Forum-recent">
		<h3 id="titre-Forum-accueil-recent">Messages récents</h3>
		<?php foreach($lastMessage as $lastM) : ?>
			<div>
				<h4 title="<?= $lastM->titre ?>"><a href="<?= $lastM->UrlSujet ?>"><?= $lastM->titre ?></a></h4>
				<h5>Auteur: <?= $lastM->auteur ?> <?= $lastM->date_creation_fr ?></h5>
				<p><?= $lastM->extrait ?></p>
			</div>
		<?php endforeach; ?>
</div>
</div>























