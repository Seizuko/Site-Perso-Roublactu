<?php
	App::getInstance()->titre = 'Dofus Actualité - Roubl\'Actu';
?>

<div class="row" style="margin:0;padding:0;">
	<div class="col-md-1">

	</div>
	<div class="col-md-8" id="fond-article">
		<div class="row">
			<div id="scroll"></div>
			<div class="col-md-12"><h1 id="titre-actu-accueil">Dofus Actualité - Roubl'Actu</h1></div>
		</div>
		
		<div class="row" id="commentaire">
			<?php foreach ($pagination as $lastArt) : ?>
				<?php foreach(App::getInstance()->getTable('Commentaire')->nbCommentaire($lastArt->id) as $nbCom) : ?>
				<a href="<?= $lastArt->Url ?>">
					<div class="col-md-6" id="image-actu-accueil">
						<img src="/img/<?=$lastArt->img?>" alt="<?= $lastArt->titre ?>">
						<div id="text-actu-accueil"  onclick="location.href='<?= $lastArt->Url ?>';">
							<h2><a href="<?= $lastArt->Url ?>"> <?= $lastArt->titre ?> </a></h2>
							<h3>Article posté par <?= $lastArt->auteur ?> le <?= $lastArt->date_creation_fr ?></h3>
							<div class="glyphicon glyphicon-comment" id="number-commentaires2"><p id="number-commentairesr"><?= $nbCom->nbCom ?></p></div>
							<div><p><?= $lastArt->extrait ?></p></div>
						</div>
					</div>
				</a>
			<?php endforeach; ?>
		<?php endforeach; ?>
		<div  class="PaginateNav col-md-12 col-ls-12 col-xs-12 col-lg-12">
		<a href="/accueil/1/"><<</a>
		<?php 
		$customPagination = 0;
		while ($customPagination < $nbpage) {
		 	echo '<a href="/accueil/'.($customPagination+1).'/">'.($customPagination+1).'</a>';
		 	$customPagination++;
		} ?>
		<a href="/accueil/<?= $nbpage ?>/">>></a>
		
		</div>

		</div>
		<div class="col-md-12 row"  id="colonne-inscrit-recent">
		<h4 id="titre-actu-accueil-recent" class="col-md-12">Inscriptions récentes</h4>
		<div class="col-md-1"></div>
		<?php foreach ($lastUser as $last) : ?>
			<div class="col-md-2"><h5 id="inscrit-recent"><?= $last->name ?></h5></div>
		<?php endforeach; ?>
	</div>
	</div>
	<div class="col-md-2" id="youtube-player">
		<a href="https://www.youtube.com/channel/UCjGPhbiOdJkkctKcmAfIn8A" id="youtube-liens" target="_blank">
		<div id="youtube-button-name"><h1>Vindicta RP</h1></div>
		<div id="youtube-button-suite"><h1>Youtube</h1></div>
		<div id="youtube-button">
			<i class="icon">
      			<i class="fa fa-youtube"></i>
  			</i>
		</div>
		
		</a>
		<iframe src="https://www.youtube.com/embed/KyU93kbk-_M" frameborder="0" allowfullscreen sandbox="allow-scripts"></iframe>
		<p>Partenaire Roubl'Actu</p>
	</div>
	<div id="there"></div>
	<div class="col-md-2"  id="colonne-actu-recent">
		<h3 id="titre-actu-accueil-recent">Récents</h3>
		<?php foreach ($post as $art) : ?>
			<div class="col-md-12">
				<a href="<?= $art->Url ?>">
					<div>
						<img src="/img/<?=$art->img?>">
						<a href="<?= $art->Url ?>" id="titre-recent"> <?= $art->titre ?> </a>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>