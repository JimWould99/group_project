const cards = document.querySelectorAll("#research_card");

for (let i = 0; i <= cards.length - 1; i++) {
  cards[i].style.display = "none";
}

function checkResults() {
  const search = document.querySelector("input");
  const search_value = search.value.toLowerCase();

  const authors = document.querySelectorAll("#author");

  if (search_value === "") {
    return;
  }

  for (let i = 0; i <= authors.length - 1; i++) {
    cards[i].style.display = "block";

    if (authors[i].innerHTML.toLowerCase().includes(search_value)) {
      console.log(`author match: ${authors[i].innerHTML}`);
      cards[i].style.display = "";
    } else {
      cards[i].style.display = "none";
    }
  }
}
