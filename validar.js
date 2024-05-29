
const form = document.querySelector('form');



let inputEmail = document.getElementById("email")

let inputPassword = document.getElementById("password")






form.addEventListener ("submit", (e) => {

let a =inputEmail.value

let b=inputPassword.value


if(a==='' && b===''){

    alert("el formulario esta vacio")
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Something went wrong!",
      });
    e.preventDefault()
}

    else {
        // alert("el formulario ha sido enviado")
        Swal.fire({
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success"
          });

    }


})

