const allResearch = document.querySelectorAll("#research_card");

let selected;

for (let i = 0; i < allResearch.length; i++) {
  allResearch[i].addEventListener("click", () => {
    for (let j = 0; j < allResearch.length; j++) {
      allResearch[j].setAttribute("style", "border-width: 0px");
    }
    selected = allResearch[i];
    allResearch[i].setAttribute(
      "style",
      "border: 7px solid #00008B; transform: scale(1.05)"
    );
  });
}

function deletion() {
  selected.remove();
}
