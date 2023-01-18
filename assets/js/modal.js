const boutonUser = document.getElementById('bouton')
  boutonUser.addEventListener('click', openModa)

function openModa() {
  const modaleOn = document.getElementById('modale')
  modaleOn.style.display = 'flex'
}

function evenementModalError() {

  const maModale2 = document.getElementById('modale')
  maModale2.style.display = 'flex'
}


const HoverModal = document.getElementById('modale')
  HoverModal.addEventListener('click', function (e) {
    if (e.target == this) EModalFerme();
  });

 const modalButtonFerme = document.getElementById('bouton-ferme')
  modalButtonFerme.addEventListener('click', EModalFerme) 

  function EModalFerme() {
  const ModalHoverOff = document.getElementById('modale')
  ModalHoverOff.style.display = 'none'
  
}