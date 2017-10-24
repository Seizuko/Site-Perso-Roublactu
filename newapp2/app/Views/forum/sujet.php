<?php

	App::getInstance()->titre = 'Dofus Actualité '.$titre->titre.' - Forum Roubl\'Actu';

if(isset($_SESSION['Auth'])){
$utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']);
} ?>

<div class="row">

	<div class="col-md-1"></div>


	<div class="col-md-8" id="zoneForum">
		<div class="row">
			<div class="col-md-12 titleForum"><a href="/index.php?p=forum.categorie"><h1>Forum Roubl'Actu</h1></a></div>
			<div class="col-xs-5 col-sm-5 col-md-6 col-lg-6 categoryForum"><h4><?= $titre->titre ?></h4></div>
			<div class="col-xs-3 col-sm-3 col-md-2 col-lg-2 categoryForum"><h4>Message</h4></div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 categoryForum"><h4>Derniers message</h4></div>
			<?php foreach ($lastSujet as $sujet) {
			foreach (App::getInstance()->getTable('message')->nbMessageSujet($sujet->id) as $nb) {
			if (($sujet->etat) == 'Visible' || ($sujet->etat) == 'Fermer') { ?>
			<div class="row">
			<div id="borderSujetForum"></div>
				<div class="col-xs-5 col-sm-5 col-md-6 col-lg-6">
				<form action="" method="post" id="deleteSujetForum" style="float: right;">
					<input type="hidden" name="id" value="<?= $sujet->id ?>">
						<select name="etat" id="selectAdmin">
							<option value="Visible">Visible</option>
							<option value="Invisible">Invisible</option>
							<option value="Fermer">Fermer</option>
						</select>
					<button type="submit" value="" id="buttonActionForum">✔</button>
				</form>
					<a href="<?= $sujet->Url ?>" id="sujetForum"><?= $sujet->titre ?></a><br><p class="descriptionSujet"><?= $sujet->auteur ?></p>
				</div>

				<div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
					<p><?= $nb->nbSujet ?></p>
				</div>

				<?php if(($sujet->etat) === 'Fermer') { ?>
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
					<p>Ce sujet est fermé</p>
				</div>
				<?php } elseif(($nb->nbSujet) > 0) { ?>
				<?php foreach (App::getInstance()->getTable('message')->lastByMessageSujet($sujet->id) as $sms) : ?>
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<p><?= $sms->date_creation_fr ?> <br> By <?=$sms->auteur?></p>
					</div>
				<?php endforeach; ?>
				<?php } else { ?>
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
					<p>Aucun message</p>
				</div>
				<?php } ?>

				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
					<?php if(isset($_SESSION['Auth']) && $utilisateurs->membre_rang == 'Administrateur'): ?>
						<form action="<?= $sujet->UrlEdit ?>" method="post" id="deleteSujetForum">
							<button title="Editer le titre du sujet" style="color: #FFFFFF" id="buttonActionForum" type="submit"
							value="<?=$sujet->id?>" name="id">
							...</button>
						</form>
					<?php else : ?>
					<?php endif; ?>
				</div>

			</div>
			<?php } else { ?>
			<?php }}} ?>
			<?php if(isset($_SESSION['Auth'])): ?>
			<div class="col-md-2"><button  id="sujetCreatForum"><a href="/index.php?p=forum.createSujet.sujetAdd&idC=<?=$_GET['idC']?>" ">Créer un sujet</a></button></div>
			<?php else : ?>
			<?php endif; ?>
		</div>
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