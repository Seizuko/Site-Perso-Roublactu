<?php
$date = date("d-m-Y");
if(isset($_SESSION['Auth'])){
$utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']);
}
if($_SERVER['REQUEST_URI'] == '/index.php') header('Location:/');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta property="og:image" content="http://roublactu.fr/img/<?= App::getInstance()->image; ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:locale" content="fr_FR"/>
    <meta property="og:title" content="<?= App::getInstance()->titre; ?>"/>
    <meta property="og:description" content="<?= App::getInstance()->description; ?>"/>
    <meta property="og:url" content="<?= App::getInstance()->Url; ?>" />
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=5.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="keywords" content="mmo, mmorpg, free mmorpg, free online mmorpg, video game, video game rental, video game system, free video game, online game, multiplayer game, free multiplayer game, dofus community, comics, pc game, pc game cheat, game, free game, online game, toy game, addicting game, actualité, Roubl'Actu, roublard, actualité dofus, dofus-pets, dofus-touch, roubl'actu dofus" />
    <meta name="language" content="fr"/>
    <link rel="icon" type="image/png" href="/img/favico.png" />
    <title><?= App::getInstance()->titre; ?></title>
    <meta name="description" content="<?= App::getInstance()->description; ?>" />
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-101518633-1', 'auto');
      ga('send', 'pageview');
    </script>
</head>
<body>

<?php if(isset($_SESSION['Auth'])): ?>
  <div id="connexion-nav" class="hiddenNavBis">
      
      <a href="/profil/<?= $_SESSION['Auth'] ?>/"><button class="connexion">Page Profil</button>
    </div>
    <div id="inscription-nav" class="hiddenNav">
      <a href="/index.php?p=users.disconnect"><button class="connexion">Déconnexion <i class="fa fa-power-off" aria-hidden="true"></i></button></a>
    </div>
    <div id="musique-nav" class="hiddenNavBis">
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
      <p id="soundtitle">Dofus 1.29 - La Campagne d'Amakna</p>
      <button class="musique" onclick="visibleNavBisBis()" style="right: 530px;">Time-machine <i class="fa fa-chevron-down" id="navArrowBis2" aria-hidden="true"></i></button>
    </div>
<?php else : ?>
    <div id="connexion-nav" class="hiddenNavBis">
      <form method="Post" class="row" action="/index.php?p=users.login">
        <span>Connexion : </span>
        <input type="text" class="col-md-2" name="name" placeholder="Nom d'utilisateur">
        <input type="password" class="col-md-2" name="password" placeholder="Mot de Passe">
        <button class="col-md-1" type="submit">Ok</button>
      </form>
      <button class="connexion" onclick="visibleNavBis()">Connexion <i class="fa fa-chevron-down" id="navArrowBis" aria-hidden="true"></i></button>
    </div>
    <div id="inscription-nav" class="hiddenNav">
    <script src="https://www.google.com/recaptcha/api.js"></script>
      <form method="post" action="/index.php?p=users.register" name="formulaire" onsubmit="return verifForm(this)" autocomplete="off" class="row" style="margin-right: 30px;">
        <input type="text" name="name" placeholder="Votre Pseudo" onblur="verifPseudo(this)" required="required" class="col-md-2">
        <input type="email" required="required" name="mail" placeholder="Votre Mail" onblur="verifMail(this)" data-errormessage='{"valueMissing": "Veuillez entrer une adresse mail valid"' class="col-md-2">
        <input type="password" name="password" placeholder="Votre mot de passe" required="required" onblur="verifPassword(this)" class="col-md-2">
        <input type="password" name="password_confirm" placeholder="Confirmer mot de passe" onblur="identiquePassword(this)" required="required" class="col-md-2">
        <input type="date" name="date_de_naissance" class="col-md-2">
        <input type="hidden" name="date_inscription" value="<?= $date ?>" class="col-md-2">
        <button class="col-md-1" type="submit" title="Validez deux fois">Ok</button>
        <button class="col-md-2 g-recaptcha" id="captcha" data-sitekey="6LebSCgUAAAAAB--gMRxEffs3LswFstp94A_E8LF" data-callback="YourOnSubmitFn" onclick="hiddenCaptcha()" title="Validez deux fois">Ok</button>
        
      </form>
      <button class="connexion" onclick="visibleNav()">Inscription <i class="fa fa-chevron-down" id="navArrow" aria-hidden="true"></i></button>
    </div>
    <div id="musique-nav" class="hiddenNavBis">
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
      <p id="soundtitle">Dofus 1.29 - La Campagne d'Amakna</p>
      <button class="musique" onclick="visibleNavBisBis()">Time-machine <i class="fa fa-chevron-down" id="navArrowBis2" aria-hidden="true"></i></button>
    </div>
<?php endif; ?>

<nav class="navbar navbar-inverse navbar-fixed-top" style="z-index: 900">
    <div class="container-fluid">
      <div class="navbar-header" style="margin-left:8%;">
        <a class="navbar-brand" href="/index.php">Accueil</a>
        <a class="navbar-brand" href="/forum/">Forum</a>
      </div>     
        <ul class="nav navbar-nav navbar-right">

          <?php if(isset($_SESSION['Auth'])): ?>
              <?php if($utilisateurs->membre_rang == 'Administrateur' || $utilisateurs->membre_rang == 'Rédacteur'): ?>
                <li style="margin-right: 130px;"><a href="/index.php?p=admin.posts.index"><span class="glyphicon glyphicon-lock"></span> Panel Admin</a></li>
              <?php else : ?>
              <?php endif; ?>
           <?php else : ?>
           <?php endif; ?>

           <?php if(isset($_SESSION['Auth'])): ?>
            <li style="margin-right: 400px;"><a style="color: white;" href="/profil/<?= $_SESSION['Auth'] ?>/"><img src="/img/imageProfil/<?= $utilisateurs->image?>.png" id="imageNav"> <?= $_SESSION['Auth']; ?></a></li>
           <?php else : ?>
           <?php endif; ?>
          <li><a href="https://www.facebook.com/RoublActu/" target="_blank" style="padding: 0;"><i class="fa fa-facebook-square" aria-hidden="true" id="fb-nav"></i></a></li>
          <li><a href="https://twitter.com/RoublActu" target="_blank" style="padding: 0;"><i class="fa fa-twitter-square" aria-hidden="true" id="tw-nav"></i></a></li>

        </ul>
    </div>

</nav>
<div class="header"> 
<a href="http://roublactu.fr"><img src="/img/logo2.png" alt="logo-Roubl'Actu" id="logoRoub"></a>
</div>

<div id="iamtop"></div>
  <div class="container" style="margin: 0; padding: 0; width: 100%;">
      <div class="starter-template">
        <?= $content; ?>
      </div>
  </div>
<footer id="iambot">
<a href="#"  id="scrollUpa"><img src="/img/remonter.png" width="80" id="scrollUp" class="hidden" alt="Dofus_Remonter_Haut_De_Page" ></a>
  <div class="row">
    <div class="col-md-5" id="footerArticle">
      <h6 style="text-align: center;">Articles récent</h6>
      <div class="row">
          <?php foreach ($post as $art) : ?>
            <div class="col-md-3 col-xs-3 col-sm-3">
              <a href="<?= $art->Url ?>" id="titreFooter"><?= $art->titre ?></a>
              <div class="extraitFooter"><p><?= $art->extrait ?></p></div>
            </div>
          <?php endforeach; ?>
      </div>
    </div>
    <div class="col-md-3" id="footerNavigation">
      <h6>Navigation</h6>
      <a href="index.php">Accueil</a><br>
      <?php if(isset($_SESSION['Auth'])): ?>
        <a href="/profil-<?= $_SESSION['Auth'] ?>">Mon Compte</a><br>
        <?php else : ?>
          <a href="/inscription/">S'inscrire</a><br>
        <?php endif; ?>
        <?php if(isset($_SESSION['Auth'])): ?>
      <a href="/inscription/">Déconnexion</a>
      <?php else : ?>
      <a href="/inscription/">Connexion</a>
      <?php endif; ?>
    </div>
    <div class="col-md-4" id="footerAPropos">
      <h6>Dofus</h6>
      <p style="color: white; text-align: center;">Dofus est un MMORPG édité par Ankama."Roubl'Actu" est un site non-officiel sans aucun lien avec Ankama.<br> Toutes les illustrations sont la propriété d'Ankama Studio et de Dofus - Tous droits réservés</p>
    </div>

    <div class="col-md-12" id="footerMentions">
      <p>Thème, design et code réalisés par CaptainFire03 et Seizuko. ©2017 Roubl'Actu.</p>
    </div>
  </div>
</footer>
<?php include 'navbar_mobile.php' ?>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript" src="/js/scroll.js"></script>
<script type="text/javascript" src="/js/Paginate.js"></script>
<script type="text/javascript" src="/js/script.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet" async>
