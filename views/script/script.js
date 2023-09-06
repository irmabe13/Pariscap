console.log("ok");
const toggler = document.querySelector(".hamburger");
const navLinksContainer = document.querySelector(".navlinks-container");

const toggleNav = (e) => {
  // Animation du bouton
  toggler.classList.toggle("open");

  const ariaToggle =
    toggler.getAttribute("aria-expanded") === "true" ? "false" : "true";
  toggler.setAttribute("aria-expanded", ariaToggle);

  // Slide de la navigation
  navLinksContainer.classList.toggle("open");
};

toggler.addEventListener("click", toggleNav);

new ResizeObserver((entries) => {
  if (entries[0].contentRect.width <= 900) {
    navLinksContainer.style.transition = "transform 0.4s ease-out";
  } else {
    navLinksContainer.style.transition = "none";
  }
}).observe(document.body);

const inputSearch = document.getElementById("search-bar");
const cardsContainer = document.getElementById("cards-container");
console.log(cardsContainer);

function displayLieux() {
  console.log(lieuArray);
  console.log(cardsContainer);
  console.log("display");
  cardsContainer.innerHTML = lieuArray
    .filter((lieu) =>
      lieu.nom.toLowerCase().includes(inputSearch.value.toLowerCase())
    )
    .map(
      (lieu) => `
      <div class='card_lieu'>
      <h2> ${lieu.nom} </h2>
      </div>
    `
    )
    .join("");
}

inputSearch.addEventListener("input", displayLieux);
