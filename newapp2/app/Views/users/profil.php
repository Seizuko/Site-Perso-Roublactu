<?php if(isset($_SESSION['Auth'])): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<?php App::getInstance()->titre = $_SESSION['Auth'].' Profil - Roubl\'Actu';  ?>

<div class="row" style="width: 99%;">

	<div class="col-md-2"></div>


	<div class="col-md-8" id="pagePerso">
		<div class="row">

		<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3" id="imageProfilPerso">
			<img src="/img/imageProfil/<?= $utilisateurs->image ?>">

			<button onclick="formImage()" id="buttonFormImage">Modifier mon image</button>
			<form action="" method="post" name="formulaire" id="formImage" class="formImageHidden">
				<?php foreach (App::getInstance()->getTable('Image')->all() as $image) : ?>
					<input name="image" type="image" value="<?= $image->images ?>" id="profil1" src="/img/imageProfil/<?= $image->images ?>" width="30%">
				<?php endforeach ?>

				<?php if($_SESSION['Auth'] == 'Seizuko'): ?>
					<input name="image" type="image" value="seizuko.png" id="profil1" src="/img/imageProfil/seizuko.png" width="30%">
				<?php endif; ?>
				<?php if($_SESSION['Auth'] == 'CaptainFire03'): ?>
					<input name="image" type="image" value="Captainfire03.png" id="profil1" src="/img/imageProfil/Captainfire03.png" width="30%">
				<?php endif; ?>
				<?php if($_SESSION['Auth'] == 'Glamshyr'): ?>
					<input name="image" type="image" value="Glamshyr" id="profil1" src="/img/imageProfil/testeur.jpg" width="30%">
				<?php endif; ?>
			</form>
		</div>

		<div class="col-md-9" id="infos-profil">
			<h1 id="pseudo">Bienvenue <?= $utilisateurs->name  ?></h1>
			<h6><span>Date d'inscription :</span> <?= $utilisateurs->date_inscription_fr  ?></h6>



			<div class="dateNaissance">
				<h6><span>Date de naissance :</span> <?= $utilisateurs->date_naissance_fr  ?></h6>
				<button id="buttonFormMail" onclick="formDate()">Modifier</button>

				<form action="" method="post" class="formMailHidden" id="formDate">
					<input type="date" name="date_de_naissance" placeholder="jj/mm/aaaa">
					<button type="submit" id="buttonFormMail">✔</button>
				</form>
			</div>

			<div class="adresseMail">
				<h6><span>Adresse mail :</span> <?= $utilisateurs->mail  ?></h6>
				<button onclick="formMail()" id="buttonFormMail">Modifier</button>

				<form action="" method="post" name="formulaire" id="formMail" class="formMailHidden">
					<input type="email" required="required" name="mail" placeholder="Nouvelle adresse Mail" onblur="verifMail(this)" data-errormessage='{"valueMissing": "Veuillez entrer une adresse mail valide"' style="float: left; width: 70%; color: black;">
					<button type="submit" id="buttonFormMail">✔</button>
				</form>
			</div>

			<div class="motDePasse">
				<h6><span>Mot de passe :</span></h6>
				<button onclick="formPassword()" id="buttonFormMail">Modifier</button>
				<form action="" method="post" name="formulaire" id="formPassword" class="formPasswordHidden">
				<!--<h6 style="color: grey; font-size: 1em">Mot de passe actuel : </h6>
					 	<input type="password" name="password" placeholder="Mot de passe actuel" required="required" onblur="verifPassword(this)"><br>-->
					<h6 style="color: grey; font-size: 1em;">Nouveau mot de passe : </h6>
					<input type="password" name="password" placeholder="Nouveau mot de passe" required="required" onblur="verifPassword(this)"><br>
	 				<input type="password" name="password_confirm" placeholder="Confirmer mot de passe" onblur="identiquePassword(this)" required="required">
	 				<button type="submit" id="buttonFormMail">✔</button>
				</form>
			</div>


			<div class="signature">
				<h4>Information Forum</h4>
				<?php foreach ($countMessage as $count) : ?>
				<h6 style="margin-bottom: 30px;"><span>Message(s) posté(s) :</span> <?= $count->nbSmsUser ?></h6>
				<?php endforeach; ?>
				<h6><span>Signature :</span> <?= $utilisateurs->signature ?></h6>
				<button id="buttonFormMail" onclick="formSignature()">Modifier</button>
				<form action="" method="post" id="formSignature" class="formSignatureHidden">
					<textarea name="signature"></textarea>
					<button type="submit" id="buttonFormMail">✔</button>
				</form>
			</div>
		</div>
</div>