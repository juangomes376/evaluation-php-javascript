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
  if (inputDescription.value.length < 20) {
    erreurDescription2 = true;
    formGroupDescription2.classList.remove("db-n");
    
  } else {
    erreurDescription2 = false;
    formGroupDescription2.classList.add("db-n");
    
  }
}
//--- validation prix ---

const inputPrix = document.getElementById("inputPrix");
const formGroupPrix = document.getElementById("alertPrix");
inputPrix.addEventListener("keyup", validationInputPrix);
inputPrix.addEventListener("change", validationInputPrix);
const messageErreurPrix = formGroupPrix.querySelector(".invalid-feedback");

function validationInputPrix(e) {
  if (inputPrix.value == 0) {
    erreurPrix = true;
    formGroupPrix.classList.remove("db-n");
    messageErreurPrix.innerHTML = "voce esta doido";
  }if(inputPrix.value < 0){


  }else {
    erreurPrix = false;
    formGroupPrix.classList.add("db-n");
    
  } 
  
  
  
  
  
}

//--- validation URL ---

const inputUrlImage = document.getElementById("inputUrlImage");
inputUrlImage.addEventListener("keyup", validationInputUrl);
const formGroupUrl = inputUrlImage.parentNode;
const messageErreurUrl = formGroupUrl.querySelector(".invalid-feedback");

//TODO :
// - vérifier que le début de l'url
//   commence bien par http:// ou https://

// - Changer le message d'erreur de l'extension :
//   celui-ci doit être par exemple :
//   "extension 'gif' non autorisée (uniquement : jpg, png ou jpeg)"
// ou si l'url ne contient pas de point :"L'url n'a pas d'extension"
function validationInputUrl(e) {
  const extensionsValides = ["jpg", "png", "jpeg"];

  //on decoupe l'url selon le caractère "."
  const partiesUrl = inputUrlImage.value.split(".");
  //on récupère le dernier élément du tableau
  //et on le met en minuscule
  const extension = partiesUrl[partiesUrl.length - 1].toLowerCase();

  //---- autre solution -----
  // const protocolesValides = ["http", "https"];
  // const partiesUrl2 = inputUrlImage.value.split("://");
  // const protocole = partiesUrl2[0].toLowerCase();
  // if(!protocolesValides.includes(protocole)){
  //gerer l'erreur
  //}

  //si l'url ne commence ni par http:// ou https://
  if (
    inputUrlImage.value.substr(0, 7) != "http://" &&
    inputUrlImage.value.substr(0, 8) != "https://"
  ) {
    erreurUrlImage = true;
    formGroupUrl.classList.add("has-danger");
    inputUrlImage.classList.add("is-invalid");
    messageErreurUrl.innerHTML =
      "Protocole invalide (l'url doit commencer par 'http://' ou 'https://')";
  } else if (!extensionsValides.includes(extension)) {
    //si le tableau des extensions valides n'inclu pas
    // l'extension de l'URL, alors c'est une erreur
    erreurUrlImage = true;
    formGroupUrl.classList.add("has-danger");
    inputUrlImage.classList.add("is-invalid");

    let message = "extension '" + extension + "' non autorisée (uniquement : ";

    for (let i = 0; i < extensionsValides.length - 1; i++) {
      message += extensionsValides[i] + ", ";
    }

    if (extensionsValides.length > 1) {
      message += " ou ";
    }

    message += extensionsValides[extensionsValides.length - 1] + ")";

    messageErreurUrl.innerHTML = message;

    //si la taille de l'URL dépasse 255 caractères
  } else if (inputUrlImage.value.length > 255) {
    erreurUrlImage = true;
    formGroupUrl.classList.add("has-danger");
    inputUrlImage.classList.add("is-invalid");
    messageErreurUrl.innerHTML = "255 caractères maximum";
  } else {
    erreurUrlImage = false;
    formGroupUrl.classList.remove("has-danger");
    inputUrlImage.classList.remove("is-invalid");
  }
}

function validerFormulaire() {
  validationInputNom();
  validationInputDescription();
  validationInputPrix();
  validationInputUrl();

  //on scroll la page à l'endroit de la première erreur
  if (erreurNom) {
    formGroupNom.scrollIntoView();
  } else if (erreurDescription) {
    formGroupDescription.scrollIntoView();
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



