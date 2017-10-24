<!-- NAVBAR MOBILE UNIQUEMENT ! -->
<nav id="mobileNav" class="row" style="padding-top:10px;">
  <a class="navicon-button" id="menu" onclick="navMobile()">
      <div class="navicon"></div>
  </a>
  <div class="controls">                 
        <svg id="play" viewBox="0 0 25 25" xml:space="preserve">
          <defs><rect x="-49.5" y="-132.9" width="446.4" height="366.4"/></defs>
            <g><circle fill="none" cx="12.5" cy="12.5" r="10.8"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M8.7,6.9V18c0,0,0.2,1.4,1.8,0l8.1-4.8c0,0,1.2-1.1-1-2L9.8,6.5 C9.8,6.5,9.1,6,8.7,6.9z"/>
            </g>
        </svg>
                        
        <svg id="pause" viewBox="0 0 25 25" xml:space="preserve">
          <g>
            <rect x="6" y="4.6" width="3.8" height="15.7"/>
            <rect x="14" y="4.6" width="3.9" height="15.7"/>
          </g>
        </svg>

        <span class="expend"><svg id="next" class="step-foreward" viewBox="0 0 25 25" xml:space="preserve">
          <g><polygon points="20.7,4.3 16.6,4.3 16.6,11.6 4.3,4.3 4.3,20.7 16.7,13.4 16.6,20.7 20.7,20.7"/></g>
        </svg></span>
      </div>
      <audio id="music" loop="false">
        <source src="/sons/song0.mp3?dl=1" type="audio/mp3" id="song">
      </audio>
</nav>

<div  id="navmobile" class="hidden">

   <div class="row" id="rowMobile">
       <?php if(isset($_SESSION['Auth'])): ?> <!-- Si connecté affiche Bonjour Pseudo, sinon affiche Visiteur -->
        <div class="col-xs-12 col-sm-12" id="pseudoNavMobile"><img src="/img/imageProfil/<?= $utilisateurs->image?>" id="imageNav"> Bonjour <?= $_SESSION['Auth']; ?></div>
        <div class="col-xs-6 col-sm-6"><a href="/profil/<?= $_SESSION['Auth'] ?>/">Mon Compte</a></div>
        <?php else : ?>
          <div class="col-xs-12 col-sm-12" id="pseudoNavMobile"> Vous n'êtes pas connecté</div>
          <div class="col-xs-6 col-sm-6"><a href="/inscription/"><span class="glyphicon glyphicon-user"></span> S'inscrire</a></div>
        <?php endif; ?>
        <div class="col-xs-6 col-sm-6">
        <?php if(isset($_SESSION['Auth'])): ?>
      <a href="/index.php?p=users.disconnect"><span class="glyphicon glyphicon-log-in"></span> Déconnexion</a>
      <?php else : ?>
      <a href="/connexion/"><span class="glyphicon glyphicon-log-in"></span> Connexion</a>
      <?php endif; ?></div>
      <?php if(isset($_SESSION['Auth'])): ?> <!-- Si connecté Admin affiche Panel Admin, sinon affiche rien -->
          <?php if($utilisateurs->membre_rang == 'Administrateur'): ?>
            <div class="col-xs-12 col-sm-12"><a href="/index.php?p=admin.posts.index"><span class="glyphicon glyphicon-lock"></span> Panel Admin</a></div>
          <?php else : ?><?php endif; ?>
       <?php else : ?>
       <?php endif; ?>
   </div>
   <div class="row">
      <div class="col-xs-12 col-sm-12"><a href="/index.php" id="liensNavMobile">Accueil</a></div>
      <div class="col-xs-12 col-sm-12"><a id="liensNavMobile" href="/forum/">Forum</a></div>
   </div>
</div>