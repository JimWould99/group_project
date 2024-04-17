/*
below section:
Connects javascript variables to the dom for manipulation.
Establishes connections to each section of the form
as well as the user inputs and feedback sections.

*/
const username_span = document.querySelector("#span_username");
const password_span = document.querySelector("#span_password");

const username = document.querySelector("#username");
const password = document.querySelector("#password");

const username_section = document.querySelector("#username_section");
const password_section = document.querySelector("#password_section");

const form = document.querySelector("form");

form.addEventListener("submit", (e) => {
  //reset feedback for corrections after first/second submission
  username_section.removeAttribute("id", "invalid");
  password_section.removeAttribute("id", "invalid");

  // create lists in case there are multiple feedback comments
  // these will be added to the spans at the end

  username_list = [];
  password_list = [];

  // check whether the input is filled in and if it is a username or email
  // then check whether the following input is valid

  if (username.value == "" || username.value == null) {
    username_list.push("Fill in username/ email");
    username_section.setAttribute("id", "invalid");
  } else if (username.value.includes("@")) {
    if (
      !username.value.match(/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/)
    ) {
      username_list.push("Not a valid email");
      username_section.setAttribute("id", "invalid");
    }
  } else {
    if (username.value.length <= 6) {
      username_list.push("username minimum 7 characters");
      username_section.setAttribute("id", "invalid");
    }
  }

  // check password has been filled or valid
  if (password.value == "" || password.value == null) {
    password_list.push("Fill in password");
    password_section.setAttribute("id", "invalid");
  } else {
    const numbers = /[0-9]/g;

    if (password.value.length <= 7) {
      password_list.push("minmum 8 characters");
      password_section.setAttribute("id", "invalid");
    }

    if (!password.value.match(numbers)) {
      password_list.push("minimum one number");
      password_section.setAttribute("id", "invalid");
    }
  }

  username_span.textContent = username_list;
  password_span.textContent = password_list;

  //give user feedback for which inputs are valid
  // also decide if to send the form

  if (username_list.length == 0) {
    username_section.setAttribute("id", "valid");
    username_span.textContent = "valid username";
  } else {
    e.preventDefault();
  }
  if (password_list.length == 0) {
    password_section.setAttribute("id", "valid");
    password_span.textContent = "valid password";
  } else {
    e.preventDefault();
  }
});
