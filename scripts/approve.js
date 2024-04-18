const dialog = document.querySelectorAll("dialog");
let submit = document.querySelectorAll("#submit");
let form = document.querySelectorAll("form");

const reject_button = document.querySelectorAll("#reject");

const approve_button = document.querySelectorAll("#approve_button");
const boxes = document.querySelectorAll(".approve_bar");

function closeDialog() {
  for (let index = 0; index < dialog.length; index++) {
    dialog[index].close();
    console.log("each");
  }
}

closeDialog();

for (let index = 0; index < boxes.length; index++) {
  reject_button[index].addEventListener("click", () => {
    dialog[index].show();
  });

  approve_button[index].addEventListener("click", () => {
    boxes[index].remove();
  });

  submit[index].addEventListener("click", (event) => {
    event.preventDefault();
    console.log("here");
    dialog[index].close();
    boxes[index].remove();
  });
}
