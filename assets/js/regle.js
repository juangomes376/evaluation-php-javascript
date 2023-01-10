//----- VALIDATION DU FORMULAIRE ------

let erreurNom = false;
let erreurDescription = false;
let erreurDescription2 = false;
let erreurPrix = false;
let erreurUrlImage = false;

//--- validation nom ---

const inputNom = document.getElementById("inputNom");
const formGroupNom = document.getElementById("alertNom");
inputNom.addEventListener("keyup", validationInputNom);
const messageErreurNom = formGroupNom.querySelector(".invalid-feedback");
function validationInputNom(e) {
  //si le champs nom contient + de 10 caractères après que
  //l'utilisateur est appuyé sur une touche
  if (inputNom.value.length > 20) {
    erreurNom = true;
    formGroupNom.classList.remove("db-n");
  } else {
    erreurNom = false;
    formGroupNom.classList.add("db-n");
    ;
  }
}

//--- validation description ---

const inputDescription = document.getElementById("inputDescription");
const formGroupDescription = document.getElementById("alertDescription");
inputDescription.addEventListener("keyup", validationInputDescription);
function validationInputDescription(e) {
  if (inputDescription.value.length < 20) {
    erreurDescription = true;
    formGroupDescription.classList.remove("db-n");
  } else {
    erreurDescription = false;
    formGroupDescription.classList.add("db-n");
  }
}

//--- validation description ---

const inputDescription2 = document.getElementById("inputDescriptionEn");
const formGroupDescription2 = document.getElementById("alertDescriptionEn");
inputDescription2.addEventListener("keyup", validationInputDescriptionEn);
function validationInputDescriptionEn(e) {
  if (inputDescriptionEn.value.length < 20) {
    erreurDescription2 = true;
    formGroupDescription2.classList.remove("db-n");
  } else {
    erreurDescription2 = false;
    formGroupDescription2.classList.add("db-n");
  }
}

//--- validation prix ---

const inputPrix = document.getElementById("inputPrix");
inputPrix.addEventListener("keyup", validationInputPrix);
inputPrix.addEventListener("change", validationInputPrix);
const formGroupPrix = document.getElementById("alertPrix");
const messageErreurPrix = document.getElementById("alertPrix");
function validationInputPrix(e) {
   if (inputPrix.value < 0) {
    erreurPrix = true;
    formGroupPrix.classList.remove("db-n");
    messageErreurPrix.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i> Gratuite cet pa possible';
  }else {
    erreurPrix = false;
    formGroupPrix.classList.add("db-n");
  } 
}

//--- validation URL ---

const inputUrlImage = document.getElementById("inputUrl");
inputUrlImage.addEventListener("keyup", validationInputUrl);
inputUrlImage.addEventListener("change", validationInputUrl);
const messageErreurUrl = document.getElementById("alertUrl");


function validationInputUrl(e) {

  const extensionsValides = ["jpg", "png", "jpeg"];
  const partiesUrl = inputUrlImage.value.split(".");
  const extension = partiesUrl[partiesUrl.length - 1].toLowerCase();

  if ( inputUrlImage.value.substr(0, 7) != "http://" && inputUrlImage.value.substr(0, 8) != "https://") {
    erreurUrlImage = true;
    messageErreurUrl.classList.remove("db-n");
    messageErreurUrl.innerHTML = "Protocole invalide (l'url doit commencer par 'http://' ou 'https://')";
  } else if (!extensionsValides.includes(extension)) {
    erreurUrlImage = true;
    messageErreurUrl.classList.remove("db-n");
    let message = "extension '" + extension + "' non autorisée (uniquement : ";
    for (let i = 0; i < extensionsValides.length - 1; i++) {
      message += extensionsValides[i] + ", ";
    }
    if (extensionsValides.length > 1) {
      message += " ou ";
    }
    message += extensionsValides[extensionsValides.length - 1] + ")";
    messageErreurUrl.innerHTML = message;
  } else if (inputUrlImage.value.length > 255) {
    erreurUrlImage = true;
    inputUrlImage.classList.remove("db-n");
    messageErreurUrl.innerHTML = "255 caractères maximum";
  } else {
    erreurUrlImage = false;
    inputUrlImage.classList.add("db-n");
  }
}





function validerFormulaire() {
  validationInputNom();
  validationInputDescription();
  validationInputDescriptionEn();
  validationInputPrix();
  validationInputUrl();

  //on scroll la page à l'endroit de la première erreur
  if (erreurNom) {
    formGroupNom.scrollIntoView();
  } else if (erreurDescription) {
    formGroupDescription.scrollIntoView();
  }else if (erreurDescriptionEn) {
    formGroupDescriptionEn.scrollIntoView();
  } else if (erreurPrix) {
    formGroupPrix.scrollIntoView();
  } else if (erreurUrlImage) {
    formGroupUrl.scrollIntoView();
  }

  //si il n'y a aucune erreur
  if (!erreurNom && !erreurDescription && !erreurPrix && !erreurUrlImage) {
    return true;
  } else {
    alert("Votre formulaire contient des erreurs");
    return false; //on n'envoit pas le formumaire
  }
}



