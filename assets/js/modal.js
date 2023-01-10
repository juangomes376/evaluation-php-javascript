// ferme la amodal-sup avec un click sur le page   



function evenementBouton() {
    const maModale = document.getElementById('modale')
    maModale.style.display = 'flex'
}
const monBouton = document.getElementById('bouton')
monBouton.addEventListener('click', evenementBouton)




var modal = document.getElementById('modale');
modal.addEventListener('click', function(e) {
  if (e.target == this) evenementBouton2();
});

const BoutonFerme = document.getElementById('bouton-ferme')
BoutonFerme.addEventListener('click', evenementBouton2)

function evenementBouton2() {
    console.log("ttt")
    const maModale = document.getElementById('modale')
    maModale.style.display = 'none'
}


var modal = document.getElementById('modale-sup');
modal.addEventListener('click', function(e) {
  if (e.target == this) evenementBouton6();
});

const BoutonFerme4 = document.getElementById('bt-ferme')
BoutonFerme4.addEventListener('click', evenementBouton6)

function evenementBouton6() {
    const maModale = document.getElementById('modale-sup')
    maModale.style.display = 'none'
}





