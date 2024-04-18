/*   
hide display of all the cards before the user searches
*/
const cards = document.querySelectorAll("#research_card");
for (let i = 0; i <= cards.length - 1; i++) {
  cards[i].style.display = "none";
}
// function below called upon any changes in search bar
// Research hence updated each time
function checkResults() {
  const search = document.querySelector("#search_bar");
  const search_value = search.value.toLowerCase();
  const authors = document.querySelectorAll("#author");
  const titles = document.querySelectorAll("#title");
  let author_button = document.querySelector("#author_select");
  let title_button = document.querySelector("#title_select");
  // Check which search parameter is checked to change display
  if (search_value === "") {
    if (author_button.checked) {
      search.placeholder = "Search by author";
    } else if (title_button.checked) {
      search.placeholder = "Search by title";
    }
    return;
  }
  // Alter research shown based upon option selected
  // Research that matches is unhidden in display
  if (author_button.checked) {
    search.placeholder = "Search by authors";
    console.log("clicked author");
    for (let i = 0; i <= authors.length - 1; i++) {
      cards[i].style.display = "block";
      if (authors[i].innerHTML.toLowerCase().includes(search_value)) {
        console.log(`author match: ${authors[i].innerHTML}`);
        cards[i].style.display = "";
      } else {
        cards[i].style.display = "none";
      }
    }
  } else if (title_button.checked) {
    search.placeholder = "Search by title";
    console.log("clicked title");
    for (let i = 0; i <= titles.length - 1; i++) {
      cards[i].style.display = "block";
      if (titles[i].innerHTML.toLowerCase().includes(search_value)) {
        console.log(`author match: ${titles[i].innerHTML}`);
        cards[i].style.display = "";
      } else {
        cards[i].style.display = "none";
      }
    }
  } else {
    for (let i = 0; i <= titles.length - 1; i++) {
      cards[i].style.display = "block";
      if (
        titles[i].innerHTML.toLowerCase().includes(search_value) ||
        authors[i].innerHTML.toLowerCase().includes(search_value)
      ) {
        cards[i].style.display = "";
      } else {
        cards[i].style.display = "none";
      }
    }
  }
}
