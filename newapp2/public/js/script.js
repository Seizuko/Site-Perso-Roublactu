window.onload=function(){CKEDITOR.replace('Users',{customConfig:'minimal_config.js'})};function navMobile(){$('#menu').toggleClass("open");if($("#navmobile").hasClass("hidden")){$('#menu').css('margin-left','71%');$("#navmobile").attr('class','visible');}else if($("#navmobile").hasClass("cache")){$('#menu').css('margin-left','71%');$("#navmobile").attr('class','visible');}else{$('#menu').css('margin-top','-18px');$('#menu').css('margin-left','1%');$("#navmobile").attr('class','cache');}}$('#commentaire').easyPaginate({paginateElement:'span',elementsPerPage:8,effect:'climb'});$('#commentaire').easyPaginate({paginateElement:'.commentairePersonne',elementsPerPage:8,effect:'climb'});$('#actuu').easyPaginate({paginateElement:'span',elementsPerPage:6,effect:'climb'});$('.scroll').on('click',function(){$.smoothScroll({scrollTarget:'#scroll'});return false;});$('#scrollUp').on('click',function(){$.smoothScroll({scrollTarget:'body'});return false;});CKEDITOR.editorConfig=function(config){config.language='fr';config.uiColor='#AADC6E';};jQuery.fn.center=function(){this.css("position","fixed");this.css("z-index","999999");this.css("top","0px");this.css("left","0px");return this;}
$(document).ready(function(){$(".texteGrosArticle p img").click(function(e){var src=$(this).attr('src');console.log(src);$("#background").css({"opacity":"0.7"}).fadeIn("slow");$("#large").html("<img src='"+src+"'/>").center().fadeIn("slow").css("width","100%").css("height","100%");return false;});$(document).keypress(function(e){if(e.keyCode==27){$("#background").fadeOut("slow");$("#large").fadeOut("slow");}});$("#background").click(function(){$("#background").fadeOut("slow");$("#large").fadeOut("slow");});$("#large").click(function(){$("#background").fadeOut("slow");$("#large").fadeOut("slow");});});jQuery.fn.center=function(){this.css("position","fixed");this.css("z-index","999999");this.css("top","0px");this.css("left","0px");return this;}
$(document).ready(function(){$(".commentairePersonne div p img").click(function(e){var src=$(this).attr('src');console.log(src);$("#background").css({"opacity":"0.7"}).fadeIn("slow");$("#large").html("<img src='"+src+"'/>").center().fadeIn("slow").css("width","100%").css("height","100%");return false;});$(document).keypress(function(e){if(e.keyCode==27){$("#background").fadeOut("slow");$("#large").fadeOut("slow");}});$("#background").click(function(){$("#background").fadeOut("slow");$("#large").fadeOut("slow");});$("#large").click(function(){$("#background").fadeOut("slow");$("#large").fadeOut("slow");});});window.addEventListener('scroll',function(ev){var top=document.getElementById('iamtop');var someDiv=document.getElementById('iamtop');var distanceToTop=someDiv.getBoundingClientRect().top;var distanceMax=-210;var distanceTotal=distanceToTop*-1;var someDiv2=document.getElementById('iambot');var distanceToTop2=someDiv2.getBoundingClientRect().top;var distanceMax2=750;var test=distanceToTop2-distanceToTop;if(distanceToTop2<=distanceMax2){$("#colonne-actu-recent").attr('class','fixedActuBot');$('#colonne-actu-recent').css({'top':test-270+'px'})}else if(distanceToTop<distanceMax){$("#colonne-actu-recent").attr('class','fixedActu');$('#colonne-actu-recent').css({'top':'30px'})}else{$("#colonne-actu-recent").attr('class','col-md-2 normalActu');$('#colonne-actu-recent').css({'top':'0px'})}});window.addEventListener('scroll',function(ev){var top=document.getElementById('iamtop');var someDiv=document.getElementById('iamtop');var distanceToTop=someDiv.getBoundingClientRect().top;var distanceMax=-200;if(distanceToTop<distanceMax){$("#scrollUp").attr('class','fixedTop');}else{$("#scrollUp").attr('class','hidden');}});window.addEventListener('scroll',function(ev){var top=document.getElementById('iamtop');var someDiv=document.getElementById('iamtop');var distanceToTop=someDiv.getBoundingClientRect().top;var distanceMax=-200;if(distanceToTop<distanceMax){$("#scrollUp").attr('class','fixedTop');}else{$("#scrollUp").attr('class','hidden');}});window.addEventListener('scroll',function(ev){var top=document.getElementById('iamtop');var someDiv=document.getElementById('iamtop');var distanceToTop=someDiv.getBoundingClientRect().top;var distanceMax=35;var distanceTotal=distanceToTop*-1;var someDiv2=document.getElementById('iambot');var distanceToTop2=someDiv2.getBoundingClientRect().top;var distanceMax2=750;var test=distanceToTop2-distanceToTop;if(distanceToTop2<=distanceMax2){$("#colonne-Forum-recent").attr('class','fixedForumBot');$('#colonne-Forum-recent').css({'top':test-270+'px'})}else if(distanceToTop<distanceMax){$("#colonne-Forum-recent").attr('class','fixedForum');$('#colonne-Forum-recent').css({'top':'30px'})}else{$("#colonne-Forum-recent").attr('class','col-md-2 normalForum');$('#colonne-Forum-recent').css({'top':'0px'})}});function verifPseudo(champ){var myPseudo=new RegExp("^[a-zA-Z0-9._-]{2,50}$");if(champ.value.length<2||champ.value.length>20||!myPseudo.test(champ.value)){champ.style.backgroundColor="#fba";champ.style.border="3px solid red";}else{champ.style.backgroundColor="#BEF781";champ.style.border="3px solid green";}}function verifMail(champ){var regex=/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;if(!regex.test(champ.value)){champ.style.backgroundColor="#fba";champ.style.border="3px solid red";}else{champ.style.backgroundColor="#BEF781";champ.style.border="3px solid green";}}function verifPassword(champ){if(champ.value.length<2||champ.value.length>50){champ.style.backgroundColor="#fba";champ.style.border="3px solid red";}else{champ.style.backgroundColor="#BEF781";champ.style.border="3px solid green";}}function identiquePassword(champ){if(document.formulaire.password.value!=document.formulaire.password_confirm.value){champ.style.backgroundColor="#fba";champ.style.border="3px solid red";}else{champ.style.backgroundColor="#BEF781";champ.style.border="3px solid green";}}function verifForm(f){var pseudoOk=verifPseudo(f.name);var mailOk=verifMail(f.email);if(pseudoOk&&mailOk)return true;else{alert("Veuillez remplir correctement tous les champs");return false;}}function formMail(){if($("#formMail").hasClass("formMailHidden")){$("#formMail").attr('class','formMailVisible');}else if($("#formMail").hasClass("formMailCache")){$("#formMail").attr('class','formMailVisible');}else{$("#formMail").attr('class','formMailCache');}}function formDate(){if($("#formDate").hasClass("formMailHidden")){$("#formDate").attr('class','formMailVisible');}else if($("#formDate").hasClass("formMailCache")){$("#formDate").attr('class','formMailVisible');}else{$("#formDate").attr('class','formMailCache');}}function formImage(){if($("#formImage").hasClass("formImageHidden")){$("#formImage").attr('class','formImageVisible');}else if($("#formImage").hasClass("formImageCache")){$("#formImage").attr('class','formImageVisible');}else{$("#formImage").attr('class','formImageCache');}}function formPassword(){if($("#formPassword").hasClass("formPasswordHidden")){$("#formPassword").attr('class','formPasswordVisible');}else if($("#formPassword").hasClass("formPasswordCache")){$("#formPassword").attr('class','formPasswordVisible');}else{$("#formPassword").attr('class','formPasswordCache');}}function formSignature(){if($("#formSignature").hasClass("formSignatureHidden")){$("#formSignature").attr('class','formSignatureVisible');}else if($("#formSignature").hasClass("formSignatureCache")){$("#formSignature").attr('class','formSignatureVisible');}else{$("#formSignature").attr('class','formSignatureCache');}}
function visibleNav(){
	if($('#inscription-nav').hasClass('hiddenNav')){
		$('#inscription-nav').attr('class','visibleNav');
		$('#navArrow').attr('class','fa fa-chevron-up');
	}else if ($('#inscription-nav').hasClass('visibleNav')) {
		$('#inscription-nav').attr('class','cacheNav');
		$('#navArrow').attr('class','fa fa-chevron-down');
	}else{
		$('#inscription-nav').attr('class','visibleNav');
		$('#navArrow').attr('class','fa fa-chevron-up');
	}
}
function visibleNavBis(){
	if($('#connexion-nav').hasClass('hiddenNav')){
		$('#connexion-nav').attr('class','visibleNav');
		$('#navArrowBis').attr('class','fa fa-chevron-up');
	}else if ($('#connexion-nav').hasClass('visibleNav')) {
		$('#connexion-nav').attr('class','cacheNav');
		$('#navArrowBis').attr('class','fa fa-chevron-down');
	}else{
		$('#connexion-nav').attr('class','visibleNav');
		$('#navArrowBis').attr('class','fa fa-chevron-up');
	}
}
function visibleNavBisBis(){
	if($('#musique-nav').hasClass('hiddenNav')){
		$('#musique-nav').attr('class','visibleNav');
		$('#navArrowBis2').attr('class','fa fa-chevron-up');
	}else if ($('#musique-nav').hasClass('visibleNav')) {
		$('#musique-nav').attr('class','cacheNav');
		$('#navArrowBis2').attr('class','fa fa-chevron-down');
	}else{
		$('#musique-nav').attr('class','visibleNav');
		$('#navArrowBis2').attr('class','fa fa-chevron-up');
	}
}
function hiddenCaptcha() {
	$('#captcha').css('display','none');
}

// LECTEUR DE MUSIQUE //

var music = document.getElementById("music");
var playButton = document.getElementById("play");
var pauseButton = document.getElementById("pause");
var next = document.getElementById("next");
var song = document.getElementById("song");
var playhead = document.getElementById("elapsed");
var timeline = document.getElementById("slider");
var timer = document.getElementById("timer");
var pochette = document.getElementById("sound");
    var i = 1;
var duration;
var titre = document.getElementById("soundtitle");
pauseButton.style.visibility="hidden";




playButton.onclick = function() {
    music.play();
    playButton.style.visibility = "hidden";
    pause.style.visibility = "visible";
}

pauseButton.onclick = function() {
    music.pause();
    playButton.style.visibility = "visible";
    pause.style.visibility = "hidden";
}


next.onclick = function(){
    song.setAttribute("src", "/sons/song"+i+".mp3");
    music.load();
    if (i == 0) {
    	$("#soundtitle").text('Dofus 1.29 - La Campagne d\'Amakna');
    }else if (i == 1) {
    	$("#soundtitle").text('Dofus 1.29 - Au Combat !');
    }else if (i == 2) {
    	$("#soundtitle").text('Dofus 1.29 - Incarnam l\'accueil des Âmes');
    }else if (i == 3) {
    	$("#soundtitle").text('Dofus 1.29 - Les plaines de Cania');
    }else if (i == 4) {
    	$("#soundtitle").text('Dofus 1.29 - Bonta la cité des Anges');
    }else if (i == 5) {
    	$("#soundtitle").text('Dofus 1.29 - Brakmar la cité des Demons');
    }else if (i == 6) {
    	$("#soundtitle").text('Dofus 1.29 - La Forêt de Pandala');
    }else if (i == 7) {
    	$("#soundtitle").text('Dofus 1.29 - Le village de Pandala');
    }else if (i == 8) {
    	$("#soundtitle").text('Dofus 1.29 - L\'ivress du combat !');
    }
    playButton.style.visibility = "hidden";
    pause.style.visibility = "visible";
    music.play();
    if (i < 8) {
        i = i + 1;
    }else{i=0;}
    
}


