



 









const modalSup = document.getElementById('modale-sup');
  modalSup.addEventListener('click', function (e) {
    if (e.target == this) evenementBouton6();
  });

  const modalBoutonFerme4 = document.getElementById('bt-ferme')
  modalBoutonFerme4.addEventListener('click', evenementBoutonFermeModal)
function evenementBoutonFermeModal() {
  const ModaleSup = document.getElementById('modale-sup')
  ModaleSup.style.display = 'none'
}





