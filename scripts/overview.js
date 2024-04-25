// select all research cards
const allResearch = document.querySelectorAll("#research_card");
// create selected variable to manipulate
let selected;

//
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

function edit() {
  let id = selected.attributes["onchange"].value;
  if (selected) {
    window.location.href = "Editresearchpage.php?_id=" + id;
  }
}

// when something is selected, and the edit research button is clicked, go the page stored on the
function deletion() {
  let id = selected.attributes["onchange"].value;
  if (selected) {
    window.location.href = "../scripts/phpScripts/deleteresearch.php?_id=" + id;
  }
}
