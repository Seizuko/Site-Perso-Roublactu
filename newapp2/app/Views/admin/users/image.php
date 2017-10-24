<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'Administrateur'): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

 <div class="col-md-4">
 	
 </div>

<div class="col-md-4"  id="zoneAdmin">
<h2  class="description" style="text-align: center; border-bottom:6px solid  rgb(199,211,29); padding-bottom: 20px; margin-bottom: 20px;">Ajouter une nouvelle photo de profil</h2>
 <form action="" method="post" enctype="multipart/form-data">
 	<input class="form-control" type="text" name="titre" placeholder="Titre de l'image" style="color: black;">
 	</br>
 	<input class="form-control" type="file" name="images">
 	</br>
 	<input type="submit" id="buttonActionForum">
 </form>
 </div>

 <div class="col-md-4">
 	
 </div>