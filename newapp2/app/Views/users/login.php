<?php if($errors): ?>
    <div class="alert alert-danger">
        Identifiants et/ou mot de passe incorrects
    </div>
<?php endif; ?>
<?php
	App::getInstance()->titre = 'Connexion Roubl\'Actu - Dofus Actualité';
?>



<div class="row" style="width: 99%;">
<div class="col-md-4">
	
</div>
<div class="col-md-4  log">
<h2 id="titre_log">Connexion</h2>
<form method="Post" class="formLogin">
<input type="text" class="form-control" name="name" placeholder="Nom d'utilisateur">
<br>
<input type="password" class="form-control" name="password" placeholder="Mot de Passe">	
<br>
<button class="buttonLogin" type="submit">Valider</button>
</div>
<div class="col-md-4">
	
</div>
</div>
</form>