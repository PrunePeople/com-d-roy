/* ------------------------------------- */
/* FICHIER JS COMMUN A TOUTES LES PAGES -*/
/* CONTIENT------------------------------*/
/* ---------LES JS DU NAVBAR------------ */
/* ---------LES JS DU FOOTER------------ */
/* ------------------------------------- */


// any CSS you import will output into a single css file (app.scss in this case)
import "../styles/app.scss";

// start the Stimulus application
import "../bootstrap";


// ---------------------- //
// ----- NAVBAR -------- //
// ---------------------- //

const menu = document.querySelector(".dropdown__language-option");
const toggleButton = document.querySelector(".navbar__icones_languages");
const languageButtonFR = document.querySelector(".dropdown__language-linkFR");
const languageButtonEN = document.querySelector(".dropdown__language-linkEN");
const menuBurger = document.querySelector(".dropdown__menu_burger-choises");
const toggleButtonBurger = document.querySelector(".navbar__menu_burger");

/**
 * Affiche ou masque le menu déroulant de langue lorsque vous cliquez sur les icônes de drapeau.
 */
toggleButton.addEventListener("click", () => {
  menu.classList.toggle("show");
});

toggleButtonBurger.addEventListener("click", () => {
  menuBurger.classList.toggle("active");
});

/**
 * Fait disparaître le menu déroulant de langue lorsque vous cliquez sur le choix "Français".
 */
languageButtonFR.addEventListener("click", () => {
  menu.classList.remove("show");
});

/**
 * Fait disparaître le menu déroulant de langue lorsque vous cliquez sur le choix "English".
 */
languageButtonEN.addEventListener("click", () => {
  menu.classList.remove("active");
});

/**
 * Fait disparaître le menu déroulant de langue et le menu burger lorsque vous cliquez en dehors du menu.
 */
document.addEventListener("click", function (event) {
  if (!menu.contains(event.target) && !toggleButton.contains(event.target)) {
    menu.classList.remove("show");
  }
});

document.addEventListener("click", function (event) {
  if (
    !menuBurger.contains(event.target) &&
    !toggleButtonBurger.contains(event.target)
  ) {
    menuBurger.classList.remove("active");
  }
});

// ---------------------- //
// ------ FOOTER -------- //
// ---------------------- //

// Attendez que le contenu de la page soit chargé
window.addEventListener("DOMContentLoaded", (event) => {
  const footer = document.querySelector("footer");

  // Fonction pour vérifier la position de défilement et masquer/afficher le footer
  function checkFooterVisibility() {
    const scrollPosition = window.scrollY;
    const windowHeight = window.innerHeight;
    const documentHeight = document.documentElement.scrollHeight;

    if (scrollPosition + windowHeight >= documentHeight) {
      footer.classList.remove("footer-hidden");
    } else {
      footer.classList.add("footer-hidden");
    }
  }

  // Ajouter l'événement de défilement
  window.addEventListener("scroll", checkFooterVisibility);

  // Appeler la fonction au chargement de la page pour gérer l'état initial du footer
  checkFooterVisibility();
});
