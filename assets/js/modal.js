// ferme la amodal-sup avec un click sur le page   

 document.addEventListener("DOMContentLoaded", onReady);

function evenementBouton() {
      console.log(345)
      const maModale = document.getElementById('modale')
      maModale.style.display = 'flex'
  } 
  
  
  function evenementBouton2() {
      const maModale = document.getElementById('modale')
      maModale.style.display = 'none'
  }
  
 function evenementBouton6() {
      const maModale = document.getElementById('modale-sup')
      maModale.style.display = 'none'
  }


 function onReady(){

  console.log("test")

  
  const monBouton = document.getElementById('bouton')
  monBouton.addEventListener('click', evenementBouton)




  var modal = document.getElementById('modale');
  modal.addEventListener('click', function(e) {
    if (e.target == this) evenementBouton2();
  });

  const BoutonFerme = document.getElementById('bouton-ferme')
  BoutonFerme.addEventListener('click', evenementBouton2)

 


  var modal = document.getElementById('modale-sup');
  modal.addEventListener('click', function(e) {
    if (e.target == this) evenementBouton6();
  });

  const BoutonFerme4 = document.getElementById('bt-ferme')
  BoutonFerme4.addEventListener('click', evenementBouton6)

 
 }



