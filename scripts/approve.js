// select variables from the DOM
const dialog = document.querySelectorAll("dialog");
const reject_button = document.querySelectorAll("#reject");
const boxes = document.querySelectorAll(".approve_bar");

// stop pop-up dialog from opening autmatically

function closeDialog() {
  for (let index = 0; index < dialog.length; index++) {
    dialog[index].close();
  }
}

closeDialog();

// loop through all research boxes and trigger pop up dialog if clicked
for (let index = 0; index < boxes.length; index++) {
  reject_button[index].addEventListener("click", () => {
    dialog[index].show();
  });
}
