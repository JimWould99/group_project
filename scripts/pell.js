const pell = window.pell;

const markup = document.getElementById("markup");

const editor = pell.init({
  element: document.getElementById("editor"),
  onChange: (html) => {
    markup.innerHTML = "";
    markup.innerText += html;
  }
});
editor.content.innerHTML = markup.value;