const username_span = document.querySelector('#span_username')
const password_span = document.querySelector('#span_password')

const username = document.querySelector('#username')
const password = document.querySelector('#password')

const username_section = document.querySelector('#username_section')
const password_section = document.querySelector('#password_section')

const form = document.querySelector('form')

form.addEventListener('submit', (e) => {
     e.preventDefault()
     
     username_section.removeAttribute("id", "invalid")
     password_section.removeAttribute("id", "invalid")

     username_list = []
     password_list = []

     if (username.value == "" || username.value == null){
        username_list.push("Fill in username/ email")
        username_section.setAttribute("id", "invalid")
     } else if (username.value.includes('@')){
        console.log('includes @')
        if (!username.value.match(/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/)){
            username_list.push("Not a valid email")
            username_section.setAttribute("id", "invalid")
        }
     } else{
        if (username.value.length <= 6) {
            username_list.push("username minimum 7 characters")
            username_section.setAttribute("id", "invalid")
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

     username_span.textContent = username_list
     password_span.textContent = password_list

     if (username_list.length == 0){
        username_section.setAttribute('id', 'valid')
        username_span.textContent = "valid username"
     } 
     if (password_list.length == 0){
         password_section.setAttribute('id', 'valid')
         password_span.textContent = "valid password"
     }

})