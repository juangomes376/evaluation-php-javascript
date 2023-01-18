


const buttonInscricao = document.getElementById('btIns')
buttonInscricao.addEventListener('click', evenementInscricao)
function evenementInscricao(e) {
  const modale = document.getElementById('modale')
  modale.style.display = 'none';

  const modale2 = document.getElementById('modale-ins')
  modale2.style.display = 'flex';

}


boutonModalInsFerme = document.getElementById('BtModalInsFerme')
boutonModalInsFerme.addEventListener('click', ModalInsFerme)
const modalIns = document.getElementById('modale-ins');

  modalIns.addEventListener('click', function (e) {
    if (e.target == this) ModalInsFerme();
  });

function ModalInsFerme() {
  const modaleIns = document.getElementById('modale-ins')
  modaleIns.style.display = 'none'
}


