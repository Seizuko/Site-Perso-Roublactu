window.onload=function() {
  CKEDITOR.replace( 'Users', {
              customConfig: 'minimal_config.js'
          })
};


function navMobile(){
	if ($( "#navmobile" ).hasClass( "hidden" )) {
		$("#navmobile").attr('class','visible');
	}else if ($( "#navmobile" ).hasClass( "cache" )){
		$("#navmobile").attr('class','visible');
	}else{
		$("#navmobile").attr('class','cache');
	}
}

$('#commentaire').easyPaginate({
    paginateElement: 'span',
    elementsPerPage: 8,
    effect: 'climb'
});


$('#actuu').easyPaginate({
    paginateElement: 'span',
    elementsPerPage: 6,
    effect: 'climb'
});



// scroll pagination //

$('.scroll').on('click', function() {
  $.smoothScroll({
    scrollTarget: '#scroll'
  });
  return false;
});

// scroll haut de page //

$('#scrollUp').on('click', function() {
  $.smoothScroll({
    scrollTarget: 'body'
  });
  return false;
});


CKEDITOR.editorConfig = function( config ) {
    config.language = 'fr';
    config.uiColor = '#AADC6E';
};



jQuery.fn.center = function () {
        this.css("position","fixed");
        this.css("z-index","999999");
        this.css("top", "0px");
        this.css("left", "0px");

        return this;
    }
 
    $(document).ready(function() {        
        $(".texteGrosArticle p img").click(function(e){
          var src = $(this).attr('src');
          console.log(src);
            $("#background").css({"opacity" : "0.7"})
                            .fadeIn("slow");            
                        
            $("#large").html("<img src='"+src+"'/>")
                       .center()
                       .fadeIn("slow")
                       .css("width","100%")
                       .css("height","100%");     
            
            return false;
        });
            
        $(document).keypress(function(e){
            if(e.keyCode==27){
                $("#background").fadeOut("slow");
                $("#large").fadeOut("slow");
            }
        });
        
        $("#background").click(function(){
            $("#background").fadeOut("slow");
            $("#large").fadeOut("slow");
        });
        
        $("#large").click(function(){
            $("#background").fadeOut("slow");
            $("#large").fadeOut("slow");
        });
        
    });


window.addEventListener('scroll', function(ev) {

  var top = document.getElementById('iamtop');
  var someDiv = document.getElementById('iamtop');
  var distanceToTop = someDiv.getBoundingClientRect().top;
  var distanceMax = -320;
  var distanceTotal = distanceToTop*-1;

  var someDiv2 = document.getElementById('iambot');
  var distanceToTop2 = someDiv2.getBoundingClientRect().top;
  var distanceMax2 = 750;

  var test = distanceToTop2 - distanceToTop;


   if (distanceToTop2 <= distanceMax2) {
     $("#colonne-actu-recent").attr('class','fixedActuBot');
     $('#colonne-actu-recent').css({'top' : test-720+ 'px'})
   }else if(distanceToTop < distanceMax){
      $("#colonne-actu-recent").attr('class','fixedActu');
      $('#colonne-actu-recent').css({'top' : '30px'})
   }else{
      $("#colonne-actu-recent").attr('class','col-md-2 normalActu');
      $('#colonne-actu-recent').css({'top' : '0px'})
   }

});

window.addEventListener('scroll', function(ev) {

   var top = document.getElementById('iamtop');
   var someDiv = document.getElementById('iamtop');
   var distanceToTop = someDiv.getBoundingClientRect().top;
   var distanceMax = -200;

   if (distanceToTop < distanceMax) {
      $("#scrollUp").attr('class','fixedTop');
   }else{
      $("#scrollUp").attr('class','hidden');
   }

});

// fin scroll haut de page//

function verifPseudo(champ)
{
  var myPseudo = new RegExp("^[a-zA-Z0-9._-]{2,50}$");
   if(champ.value.length < 2 || champ.value.length > 20 || !myPseudo.test(champ.value))
   {
      champ.style.backgroundColor = "#fba";
      champ.style.border = "3px solid red";
   }
   else
   {
      champ.style.backgroundColor = "#BEF781";
      champ.style.border = "3px solid green";
   }
}


function verifMail(champ)
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value))
   {
     champ.style.backgroundColor = "#fba";
     champ.style.border = "3px solid red";
   }
   else
   {
     champ.style.backgroundColor = "#BEF781";
     champ.style.border = "3px solid green";
   }
}

function verifPassword(champ)
{
   if(champ.value.length < 2 || champ.value.length > 50)
   {
      champ.style.backgroundColor = "#fba";
      champ.style.border = "3px solid red";
   }
   else
   {
      champ.style.backgroundColor = "#BEF781";
      champ.style.border = "3px solid green";
   }
}


function identiquePassword(champ)
{
if(document.formulaire.password.value != document.formulaire.password_confirm.value) {
  champ.style.backgroundColor = "#fba";
  champ.style.border = "3px solid red";
}
else{
  champ.style.backgroundColor = "#BEF781";
  champ.style.border = "3px solid green";
}
}



function verifForm(f)
{
   var pseudoOk = verifPseudo(f.name);
   var mailOk = verifMail(f.email);

   
   if(pseudoOk && mailOk)
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}

function formMail() {
  if ($("#formMail").hasClass( "formMailHidden" )) {
    $("#formMail").attr('class','formMailVisible');
  }else if ($( "#formMail" ).hasClass( "formMailCache" )){
    $("#formMail").attr('class','formMailVisible');
  }else{
    $("#formMail").attr('class','formMailCache');
  }
}

function formImage() {
  if ($("#formImage").hasClass( "formImageHidden" )) {
    $("#formImage").attr('class','formImageVisible');
  }else if ($( "#formImage" ).hasClass( "formImageCache" )){
    $("#formImage").attr('class','formImageVisible');
  }else{
    $("#formImage").attr('class','formImageCache');
  }
}

function formPassword() {
  if ($("#formPassword").hasClass( "formPasswordHidden" )) {
    $("#formPassword").attr('class','formPasswordVisible');
  }else if ($( "#formPassword" ).hasClass( "formPasswordCache" )){
    $("#formPassword").attr('class','formPasswordVisible');
  }else{
    $("#formPassword").attr('class','formPasswordCache');
  }
}

