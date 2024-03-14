const username_span = document.querySelector('#span_username')
const password_span = document.querySelector('#span_password')
const confirm_span= document.querySelector('#span_confirmation')

const username = document.querySelector('#username')
const password = document.querySelector('#password')
const confirmation = document.querySelector('#confirm')

const username_section = document.querySelector('.form_section')
const password_section = document.querySelector('#first_sub')
const confirm_section = document.querySelector('#second_sub')

const form = document.querySelector('form')


form.addEventListener('submit', (e) => {
       e.preventDefault()
       username_section.removeAttribute("id", "invalid")
       password_section.removeAttribute("id", "invalid")
       confirm_section.removeAttribute("id", "invalid")
       
       username_list = []
       password_list = []
       confirmation_list = []

       if (username.value == "" || username.value == null){
           username_list.push("Fill in username")
           username_section.setAttribute("id", "invalid")
       } else if (username.value.length <= 6) {
          username_list.push("minimum 7 characters")
          username_section.setAttribute("id", "invalid")
       }


       if (confirmation.value !== password.value) {
        confirmation_list.push(" Passwords must match")
        password_list.push(" Passwords must match")
        password_section.setAttribute("id", "invalid")
        confirm_section.setAttribute("id", "invalid")
    }

      
       if (confirmation.value == "" || confirmation.value == null){
        confirmation_list.push("Fill in confirmation")
        confirm_section.setAttribute("id", "invalid")
    } else {
        const numbers = /[0-9]/g

        if (confirmation.value.length <= 7) {
        confirmation_list.push("minimum 8 characters")
        confirm_section.setAttribute("id", "invalid")
       } 

       if (!confirmation.value.match(numbers)){
        confirmation_list.push("minimum one number")
        confirm_section.setAttribute("id", "invalid")
       }

    }

    if (password.value == "" || password.value == null){
        password_list.push("Fill in password")
        password_section.setAttribute("id", "invalid")
    } else {
        
       const numbers = /[0-9]/g

       if (password.value.length <= 7) {
        password_list.push('minmum 8 characters')
        password_section.setAttribute("id", "invalid")
       }

       if (!password.value.match(numbers)){
        password_list.push("minimum one number")
        password_section.setAttribute("id", "invalid")
       }
    }

       /*
       numbers = [0,1,2,3,4,5,6,7,8,9]
       let has_number = false
       for (let i = 0; i <= numbers.length-1; i++){
          if(password.value.includes(numbers[i])){
              has_number = true;
          } 
       }
       if(!has_number){
        password_list.push("Minimum one number")
        password_section.setAttribute("id", "invalid")
       }*/

       username_span.textContent = username_list
       password_span.textContent = password_list
       confirm_span.textContent = confirmation_list

       if (username_list.length == 0){
          username_section.setAttribute('id', 'valid')
          username_span.textContent = "ababa"
       } 
       if (password_list.length == 0){
           password_section.setAttribute('id', 'valid')
           password_span.textContent = "ababa"
       }

       if(confirmation_list.length == 0){
          confirm_section.setAttribute('id', 'valid')
       }
       /*
       password_section.setAttribute("id", "invalid")
       confirm_section.setAttribute("id", "invalid") */


       console.log(`username: ${username.value}`)
       console.log(`password: ${password.value}`)
       console.log(`confirm: ${confirm.value}`)

  
  })