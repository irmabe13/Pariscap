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
  console.log("display");
  // keys = Object.keys(lieuArray);

  for (let i in lieuArray) {
    console.log(i.toLowerCase().includes(inputSearch.value));

    if (i.toLowerCase().includes(inputSearch.value.toLowerCase())) {
      cardsContainer.innerHTML = lieuArray[i];
    } else if (inputSearch.value.toLowerCase() == null) {
      cardsContainer.innerHTML = lieuArray;
    }
  }

  // cardsContainer.innerHTML = keys
  //   .filter((lieu) => lieu.includes(inputSearch.value))
  //   .map((lieu) => lieuArray[lieu])
  //   .join("");
}

console.log(cardsContainer);
inputSearch.addEventListener("input", displayLieux);
