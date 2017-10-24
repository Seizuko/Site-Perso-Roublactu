<div class="col-md-10 col-md-offset-1" id="zoneAdmin">
<?php foreach($lastMessage as $last) : ?>
<?php if (($last->etat) === 'Invisible') { ?>
<h4>Titre du sujet : <?= $last->titre ?></h4>
<p>Auteur : <?= $last->auteur ?></p>
<form action="" method="post" id="deleteSujetForum">
	<input type="hidden" name="id" value="<?= $last->id ?>">
		<select name="etat" id="selectAdmin">
			<option value="Visible">Visible</option>
			<option value="Invisible">Invisible</option>
		</select>
	<button type="submit" value="" id="buttonActionForum">✔</button>
</form>
<?php } else {} ?>
<?php endforeach; ?>
</div>