
const form = document.querySelector('form');



let inputEmail = document.getElementById("email")

let inputPassword = document.getElementById("password")






form.addEventListener ("submit", (e) => {

let a =inputEmail.value

let b=inputPassword.value


if(a ==='' || b ===''){

    
    Swal.fire({
        icon: "error",
        title: "El formulario esta vacío",
        text: "Por favor verifica los campos",
      });
    e.preventDefault()
    } 
else {
        Swal.fire({
        title: "",
        text: "El formulario ha sido envíado",
        icon: "success",
     })
         


         console.log("el formulario ha sido envíado");
        


        }

})

