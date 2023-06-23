const username = document.getElementById("username");
const password = document.getElementById("password");
const form = document.querySelector("form");
const errorMessage = document.getElementById("errorMessage");

form.addEventListener("submit", (e) =>{
    const errors =[];

if(username.value.trim() === ""){
    errors.push("username is required");
}


if(password.value.trim() ===""){
    errors.push("password is required");
}



if(password.value.length <4){
    errors.push("password must be atleast 4 characters");
}


if(password.value.length >10){
    errors.push("password must be less than 10 characters");
}



if(errors.length > 0){
   e.preventDefault();
   errorMessage.toggleAttribute("hidden");
   errorMessage.innerHTML = errors.join(', ');
}

})
