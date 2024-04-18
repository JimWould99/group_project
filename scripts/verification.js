/*
below section:
Connects javascript variables to the dom for manipulation.
Establishes connections to each section of the form
as well as the user inputs and feedback sections.

*/
const username_span = document.querySelector("#span_username");
const email_span = document.querySelector("#span_email");
const password_span = document.querySelector("#span_password");
const confirm_span = document.querySelector("#span_confirmation");

const extra_span = document.querySelector("#radio_match");

const username = document.querySelector("#username");
const email = document.querySelector("#email");
const password = document.querySelector("#password");
const confirmation = document.querySelector("#confirm");

const asm_button = document.querySelector("#asm");
const ir_button = document.querySelector("#ir");

const username_section = document.querySelector("#first_sub");
const email_section = document.querySelector("#second_sub");
const password_section = document.querySelector("#third_sub");
const confirm_section = document.querySelector("#fourth_sub");

const extra_section = document.querySelector("#extra_section");

const form = document.querySelector("form");

form.addEventListener("submit", (e) => {
  //reset feedback for corrections after first/second submission

  username_section.removeAttribute("id", "invalid");
  email_section.removeAttribute("id", "invalid");
  password_section.removeAttribute("id", "invalid");
  confirm_section.removeAttribute("id", "invalid");
  extra_section.removeAttribute("id", "invalid");

  // create lists in case there are multiple feedback comments
  // these will be added to the spans at the end

  let username_list = [];
  let password_list = [];
  let confirmation_list = [];
  let extra_list = [];

  // check a radio button has been selected
  if (!asm_button.checked && !ir_button.checked) {
    extra_list.push("Check user option");
    extra_section.setAttribute("id", "invalid");
  }

  // check email has been filled or valid
  if (email.value == "" || email.value == null) {
    email_span.textContent = "Fill in email";
    email_section.setAttribute("id", "invalid");
  } else if (
    !email.value.match(/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/)
  ) {
    email_span.textContent = "Invalid email address";
    email_section.setAttribute("id", "invalid");
  } else {
    email_span.textContent = "email valid";
    email_section.setAttribute("id", "valid");
  }

  // check username has been filled or valid
  if (username.value == "" || username.value == null) {
    username_list.push("Fill in username");
    username_section.setAttribute("id", "invalid");
  } else if (username.value.length <= 6) {
    username_list.push("Min. 7 characters");
    username_section.setAttribute("id", "invalid");
  }

  // check passwords match
  if (confirmation.value !== password.value) {
    extra_list.push(" Passwords must match");
    extra_section.setAttribute("id", "invalid");
  }

  // check confirmation password has been filled or valid
  if (confirmation.value == "" || confirmation.value == null) {
    confirmation_list.push("Fill in confirmation");
    confirm_section.setAttribute("id", "invalid");
  } else {
    const numbers = /[0-9]/g;

    if (confirmation.value.length <= 7) {
      confirmation_list.push(" Min. 8 characters");
      confirm_section.setAttribute("id", "invalid");
    }

    if (!confirmation.value.match(numbers)) {
      confirmation_list.push(" Min. 1 number");
      confirm_section.setAttribute("id", "invalid");
    }
  }

  // check password has been filled or valid
  if (password.value == "" || password.value == null) {
    password_list.push("Fill in password");
    password_section.setAttribute("id", "invalid");
  } else {
    const numbers = /[0-9]/g;

    if (password.value.length <= 7) {
      password_list.push(" Min. 8 characters");
      password_section.setAttribute("id", "invalid");
    }

    if (!password.value.match(numbers)) {
      password_list.push(" Min. 1 number");
      password_section.setAttribute("id", "invalid");
    }
  }

  username_span.textContent = username_list;
  password_span.textContent = password_list;
  confirm_span.textContent = confirmation_list;
  extra_span.textContent = extra_list;

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

  if (confirmation_list.length == 0) {
    confirm_section.setAttribute("id", "valid");
    confirm_span.textContent = "valid confirmation";
  } else {
    e.preventDefault();
  }

  if (extra_list.length == 0) {
    extra_section.setAttribute("id", "valid");
    extra_span.textContent = "valid confirmation";
  } else {
    e.preventDefault();
  }
});
