<?php if(isset($_SESSION['Auth'])){
$utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']);
}

date_default_timezone_set('Europe/Paris');

$date = date('Y-m-d');
$heure = date("H:i:s");

App::getInstance()->titre =  'Dofus Actualité '.$titre->titre.' - Forum Roubl\'Actu';
?>

<div class="col-md-1">

</div>

<div class="col-md-8" id="zoneForum">
<div class="commentaire">
	<div id="scroll"></div>
	<h4><?= $titre->titre ?></h4>

	<div id="commentaire">
		<span>
			<?php if($lastByMessage) : ?>
			<?php foreach ($lastByMessage as $sms) : ?>
					<div class="commentairePersonne">


						<div class="row" id="topComment">
					    	<div class="col-xs-3 col-sm-3 col-md-1 col-lg-1" id="imageProfilPerso">
								<img src="/img/imageProfil/<?= $sms->image ?>">
							</div>


							<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7">
								<h5 style="margin-bottom: -10px; font-size: 25px; font-weight: bold;"><?= $sms->auteur ?></h5><br>
								<?php foreach (App::getInstance()->getTable('message')->countMessage($sms->users_id) as $nbreSmsUser) : ?>
								<p style="color: white; margin-top: -12px;">Message(s) : <?= $nbreSmsUser->nbSmsUser ?></h4>
								<?php endforeach; ?>
								<p style="color: white; margin-top: -12px;"><?= $sms->date_creation_fr ?></p>
							</div>

							<?php if(isset($_SESSION['Auth']) && $utilisateurs->membre_rang == 'Administrateur'): ?>
									<form action="/index.php?p=forum.delMessage.messageDel&idC=<?= $_GET['idC'] ?>&idS=<?= $_GET['idS'] ?>" method="post">
										<button title="Supprimer un message" type="submit" value="<?=$sms->id?>" name="id" style="float: right;">X</button>
									</form>
									<form action="<?= $sms->Url ?>" method="post">
										<button title="Editer un message" type="submit" value="<?=$sms->id?>" name="id" style="float: right;">...</button>
									</form>
							<?php elseif (isset($_SESSION['Auth']) == $sms->auteur) : ?>
								<form action="<?= $sms->Url ?>" method="post">
									<input type="hidden" value="<?= $sms->auteur ?>">
									<button title="Editer un message" type="submit" value="<?=$sms->id?>" name="id" style="float: right;">...</button>
								</form>
							<?php else : ?>
							<?php endif; ?>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<br><p><?= $sms->message ?></p>
								<hr>
								<p><?= $sms->signature ?></p>
							</div>
						</div>
					</div>
			<?php endforeach; ?>
			<?php elseif (isset($lastByMessage)) : ?>
				<h3>Aucun message posté sur ce sujet.</h3>
			<?php endif; ?>
		</span>
	</div>

	<?php if(isset($_SESSION['Auth']) && ($sms->etat) === 'Visible') { ?>
	<!-- Si connecté affiche form commentaire, sinon affiche Redirection -->
        <div class="commentaireTexte">
			<h3>Rediger votre message</h3>
				<form method="post">
					<input type="hidden" name="users_id" value="<?= $_SESSION['Id'] ?>">
					<input type="hidden" name="categorie_sms_id" value="<?= $_GET['idC'] ?>">
					<input type="hidden" name="sujet_id" value="<?= $_GET['idS'] ?>">
					<input type="hidden" name="auteur" value="<?= $_SESSION['Auth']?>">
					<input type="hidden" name="date_creation" value="<?= $date?> <?= $heure ?>">
					<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'Administrateur'): ?>
					<textarea class="form-control ckeditor" name="message" placeholder="Ajouter votre message" >
					</textarea>
					<?php else : ?>
					<noscript>Veuillez activer JavaScript pour écrire un commentaire</noscript>
					<script>
						document.write('<textarea class="form-control" name="message" id="Users" placeholder="Ajouter votre message" ></textarea>');
					</script>
					<?php endif; ?>
					<input id="buttonActionForum" type="submit" name="" style="margin-top: 20px;">
				</form>
		</div>
        <?php } elseif((isset($_SESSION['Auth']) && $utilisateurs->membre_rang == 'Administrateur') && ($sms->etat) == 'Fermer') { ?>
        <h4>Ce sujet est actuellement fermer !</h4>
        <div class="commentaireTexte">
			<h3>Rediger votre message</h3>
				<form method="post">
					<input type="hidden" name="users_id" value="<?= $_SESSION['Id'] ?>">
					<input type="hidden" name="categorie_sms_id" value="<?= $_GET['idC'] ?>">
					<input type="hidden" name="sujet_id" value="<?= $_GET['idS'] ?>">
					<input type="hidden" name="auteur" value="<?= $_SESSION['Auth']?>">
					<input type="hidden" name="date_creation" value="<?= $date?> <?= $heure ?>">
					<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'Administrateur'): ?>
					<textarea class="form-control ckeditor" name="message" placeholder="Ajouter votre message" >
					</textarea>
					<?php else : ?>
					<noscript>Veuillez activer JavaScript pour écrire un commentaire</noscript>
					<script>
						document.write('<textarea class="form-control" name="message" id="Users" placeholder="Ajouter votre message" ></textarea>');
					</script>
					<?php endif; ?>
					<input id="buttonActionForum" type="submit" name="" style="margin-top: 20px;">
				</form>
		</div>
		<?php } elseif(($sms->etat) == 'Fermer') { ?>
		<h4>Ce sujet est actuellement fermer !</h4>
        <?php } else { ?>
        	<br>
          	<p>Je vous invite à vous connecter, si vous voulez poster un commentaire. <a href="/index.php?p=users.login">>> Connexion <<</a></p>
          	<p>Si vous n'êtes pas inscrit, je vous invite à le faire ici. <a href="/index.php?p=users.register">>> Inscription <<</a></p>
        <?php } ?>

	</div>
	
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

<div class="col-md-2">

</div>

<div id="large"></div>
<div id="background"></div>