<?php
	$monUrl = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 

	App::getInstance()->titre = 'Dofus Actualité - '.$single->titre.' - Roubl\'Actu';
	App::getInstance()->description = $single->titre;
	App::getInstance()->image = $single->img;
	App::getInstance()->Url = $monUrl;


if(isset($_SESSION['Auth'])){
	$utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']);
}
?>


<div class="col-md-1"></div>
<div class="col-md-8" id="grosArticle">
	<h1 id="grostitre_article"><?= $single->titre; ?></h1>
	<img src="/img/<?=$single->img?>" alt="<?= $single->titre; ?>">
	<div class="texteGrosArticle">
		<p><?= $single->contenu; ?></p>
		<br><br>
		<h6>Article posté par <?= $single->auteur ?> </h6>
		<a href="javascript:history.back()" id="boutton-précédent">Page précédente </a>
	</div>
	
	<div class="commentaire">
		<div id="scroll"></div>
		<h4>Commentaire(s) :</h4>

		<div id="commentaire">
			<?php foreach ($lastCom as $last) : ?>
			<span>
				<div class="commentairePersonne row">
					
					<div class="col-md-1 col-sm-2 col-xs-2" id="imageProfilPersoCommentaire">
						<img src="/img/imageProfil/<?= $last->image ?>" alt="<?= $last->auteurCommentaire ?>">
					</div>
					<div class="col-md-10 col-sm-9 col-xs-9" id="imageProfilPersoCommentaire">
					<?php if(isset($_SESSION['Auth'])): ?> 
				          <?php if($utilisateurs->membre_rang == 'Administrateur'): ?>
								<form action="index.php?p=posts.deleteCom" method="post" class="formComDelete">
									<button class="buttonComDelete" type="submit" value="<?=$last->commentaires_id?>" name="id">X</button>
								</form>
								<a href="/index.php?p=posts.editCom&idA=<?= $_GET['idA'] ?>&id=<?=$last->commentaires_id;?>" ><button class="buttonComDelete" style="float: right; margin-right:5px; ">...</button></a>
							<?php else : ?><?php endif; ?>
				    <?php else : ?>
				    <?php endif; ?>
						<h5><?= $last->auteurCommentaire ?></h5>
						<p><?= $last->commentaire ?></p>
					</div>
				</div>
			</span>
			<?php endforeach; ?>
		</div>
	</div>

<?php if(isset($_SESSION['Auth'])): ?>
        <div class="commentaireTexte">
			<h2>Ajouter un commentaire</h2>
				<form method="post" action="index.php?p=<?php echo $_GET['p'] ?>&idA=<?= $_GET['idA'] ?>">
					<input type="hidden" name="auteurCommentaire" value="<?= $_SESSION['Auth']?>">
					<textarea class="form-control" name="commentaire" placeholder="Ajouter votre commentaire" ></textarea>
					<input type="hidden" name="articles_id" value="<?= $_GET['idA'] ?>">
					<input type="hidden" name="users_id" value="<?= $_SESSION['Id'] ?>">
					<input id="buttonActionForum" type="submit" name="" style="margin-top: 20px;">
				</form>
		</div>
        <?php else : ?>
          	<p>Je vous invite à vous connecter, si vous voulez poster un commentaire. <a href="/connection/">>> Connexion <<</a></p>
          	<p>Si vous n'êtes pas inscrit, je vous invite à le faire ici <a href="/inscription/">>> Inscription <<</a></p>
        <?php endif; ?>
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

	<div class="col-md-2"  id="colonne-actu-recent">
		<h3 id="titre-actu-accueil-recent">Récents</h3>
		<?php foreach ($post as $art) : ?>
			<div class="col-md-12">
				<a href="<?= $art->Url ?>">
					<div>
						<img src="/img/<?=$art->img?>" alt="<?= $art->titre ?>">
						<a href="<?= $art->Url ?>" id="titre-recent"> <?= $art->titre ?> </a>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
	
<div id="large"></div>   
<div id="background"></div>