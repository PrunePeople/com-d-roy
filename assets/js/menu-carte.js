//--
// CARTE JS LOGIC
//--

import "../styles/menu-carte.scss";


//--
// Vanilla JS
//--

// Position de la barre de navigation suivant le défilement de la fenêtre
window.addEventListener("scroll", () => {
  const navigation = document.querySelector(".menu-navigation");
  const windowHeight = window.innerHeight;
  const threshold = windowHeight * 1.3;

  if (window.scrollY > threshold) {
    navigation.classList.add("sticky"); // Ajout de la classe .sticky
  } else {
    navigation.classList.remove("sticky");
  }
});

// Bouton de retour en haut
// Apparition de la flèche suivant le défilement de l'écran
window.addEventListener("scroll", () => {
  const scrollPosition = window.scrollY || document.documentElement.scrollTop;

  const scrollToTopButton = document.querySelector(".scroll-to-top");

  if (scrollPosition > 500) {
    scrollToTopButton.classList.add("show"); // Ajout de la classe .show pour montrer la flèche
  } else {
    scrollToTopButton.classList.remove("show");
  }
});

// Fait défiler la fenêtre vers le haut de la page lors du clique
document.querySelector(".scroll-to-top").addEventListener("click", (e) => {
  e.preventDefault();
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});
