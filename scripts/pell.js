const pell = window.pell;
const editor = document.getElementById("editor");
const markup = document.getElementById("markup");

pell.init({
  element: editor,
  onChange: (html) => {
    markup.innerHTML = "";
    markup.innerText += html;
  }
})