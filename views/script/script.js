console.log("ok");
const toggler = document.querySelector(".hamburger");
const navLinksContainer = document.querySelector(".navlinks-container");

const toggleNav = (e) => {
  // Animation du bouton
  toggler.classList.toggle("open");

  const ariaToggle =
    toggler.getAttribute("aria-expanded") === "false" ? "true" : "false";
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
const searchChoice = document.getElementById("searchChoice");

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
      <div class='card-lieu'>
        <div class='card-lieu-inner'>
          <div class='card-lieu-front'>
            <h2 class='nom-lieu'>${lieu.nom}</h2>
            <img class='lieu-image' src='public/images/${lieu.image}'>
            <a class='plus' href='?s=lieu&idL=${lieu.id}' aria-current='page'>+</a> 
          </div>
        <div class='card-lieu-back'>
          <p class='courte-description'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti porro, eum nam ut vitae, itaque odit, quis maiores ab cupiditate aspernatur eveniet tempore error et! Id pariatur quisquam distinctio quo excepturi animi iure dolor impedit velit odit. Reprehenderit quis mollitia accusamus aliquid, libero delectus. Tempora ratione ut id et omnis! </p>
          <a class='plus' href='?s=lieu&idL=${lieu.id}' aria-current='page'>+</a>
        </div>
        </div>
      </div>
      <br>
    `
    )
    .join("");
}

function displayEvents() {
  console.log(eventsArray);

  cardsContainer.innerHTML = eventsArray
    .filter((event) =>
      event.titre.toLowerCase().includes(inputSearch.value.toLowerCase())
    )
    .map(
      (event) => `
    <div class='card-lieu'>
      <div class='card-lieu-inner'>
      <div class='card-lieu-front'>
      <h2 class='nom-lieu'> Evenement : ${event.titre}</h2><img class='lieu-image' src='public/images/events/${event.image}'>
      </div>
      <div class='card-lieu-back'>
      <p class='courte-description'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti porro, eum nam ut vitae, itaque odit, quis maiores ab cupiditate aspernatur eveniet tempore error et! Id pariatur quisquam distinctio quo excepturi animi iure dolor impedit velit odit. Reprehenderit quis mollitia accusamus aliquid, libero delectus. Tempora ratione ut id et omnis! </p>
      <a class='plus' href='?s=lieu&idL=${event.id}' aria-current='page'>+</a>
      </div>
      </div>
      </div>
      <br>
      `
    );
}

function displayBoth() {
  console.log("both");
  cardsContainer.innerHTML =
    lieuArray
      .filter((lieu) =>
        lieu.nom.toLowerCase().includes(inputSearch.value.toLowerCase())
      )
      .map(
        (lieu) => `
      <div class='card-lieu'>
        <div class='card-lieu-inner'>
          <div class='card-lieu-front'>
          <h2 class='nom-lieu'>${lieu.nom}</h2><img class='lieu-image' src='public/images/${lieu.image}'>
          </div>
        <div class='card-lieu-back'>
          <p class='courte-description'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti porro, eum nam ut vitae, itaque odit, quis maiores ab cupiditate aspernatur eveniet tempore error et! Id pariatur quisquam distinctio quo excepturi animi iure dolor impedit velit odit. Reprehenderit quis mollitia accusamus aliquid, libero delectus. Tempora ratione ut id et omnis! </p>
          <a class='plus' href='?s=lieu&idL=${lieu.id}' aria-current='page'>+</a>
          </div>
        </div>
      </div>
      <br>
      `
      )
      .join("") +
    eventsArray
      .filter((event) =>
        event.titre.toLowerCase().includes(inputSearch.value.toLowerCase())
      )
      .map(
        (event) => `
          <div class='card-lieu'>
            <div class='card-lieu-inner'>
            <div class='card-lieu-front'>
            <h2 class='nom-lieu'> Evenement : ${event.titre}</h2><img class='lieu-image' src='public/images/events/${event.image}'>
            </div>
            <div class='card-lieu-back'>
            <p class='courte-description'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti porro, eum nam ut vitae, itaque odit, quis maiores ab cupiditate aspernatur eveniet tempore error et! Id pariatur quisquam distinctio quo excepturi animi iure dolor impedit velit odit. Reprehenderit quis mollitia accusamus aliquid, libero delectus. Tempora ratione ut id et omnis! </p>
            <a class='plus' href='?s=lieu&idL=${event.id}' aria-current='page'>+</a>
            </div>
            </div>
            </div>
            <br>
   `
      );
}
try {
  inputSearch.addEventListener("input", () => {
    console.log("input");
    console.log(searchChoice.value);
    if (searchChoice.value == "lieu") {
      displayLieux();
    } else if (searchChoice.value == "event") {
      displayEvents();
    }
  });

  searchChoice.addEventListener("input", () => {
    if (searchChoice.value == "lieu") {
      displayLieux();
    } else if (searchChoice.value == "event") {
      displayEvents();
    } else if (searchChoice.value == "both") {
      displayBoth();
    }
  });
  displayLieux();
} catch (error) {
  console.error(error);
}
try {


  const nb_events = event_html.length;
  for (let button_index = 0; button_index < nb_events; button_index++) {
  document.getElementById(`radio-btn-${button_index}`).addEventListener("click", () => {
    let oldButtonClicked = document.getElementsByClassName("clicked")[0];
    console.log(oldButtonClicked);
    oldButtonClicked.classList.remove("clicked");
    oldButtonClicked.classList.add("unclicked");
    document
      .getElementById(`radio-btn-${button_index}`)
      .classList.remove("unclicked");
    document
      .getElementById(`radio-btn-${button_index}`)
      .classList.add("clicked");
    document.getElementById("slider-accueil").innerHTML = event_html[button_index];
    });
  }
}
catch (error) {
  console.error(error)
}
try {
  inputSearch.addEventListener("input", () => {
    console.log("input");
    console.log(searchChoice.value);
    if (searchChoice.value == "lieu") {
      displayLieux();
    } else if (searchChoice.value == "event") {
      displayEvents();
    }
  });

  searchChoice.addEventListener("input", () => {
    if (searchChoice.value == "lieu") {
      displayLieux();
      inputSearch.placeholder = "Rechercher un lieu";
    } else if (searchChoice.value == "event") {
      displayEvents();
      inputSearch.placeholder = "Rechercher un event";
    } else if (searchChoice.value == "all") {
      displayBoth();
      inputSearch.placeholder = "Rechercher un lieu/evenement";
    }
  });

  displayLieux();
}
catch (error) {
  console.error(error);
}
