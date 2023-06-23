$(document).ready(function(){
    $(".bidButton").click(function(){
        var formId = $(this).data("form");
        $("#" + formId).toggle();
    });

    $(".bidForm").submit(function(e){
        e.preventDefault();
        $(this).trigger("reset");
        $(this).hide();
    })
});

// Update each timer display
function updateTimers() {
  var timerElements = document.getElementsByClassName('timer');

  Array.from(timerElements).forEach(function(timerElement) {
    // Get the duration from the data-duration attribute
    var duration = parseInt(timerElement.getAttribute('data-duration'), 10);

    // Calculate the remaining time
    var hours = Math.floor(duration / 3600);
    var minutes = Math.floor((duration % 3600) / 60);
    var seconds = duration % 60;

    // Format the time values
    var formattedTime = 
      (hours < 10 ? "0" + hours : hours) + ":" +
      (minutes < 10 ? "0" + minutes : minutes) + ":" +
      (seconds < 10 ? "0" + seconds : seconds);

    // Update the timer element
    timerElement.innerHTML = formattedTime;

    // Decrease the remaining time
    duration--;

    // Check if the timer has reached zero
    if (duration < 0) {
      // Perform any actions you want to take when the timer ends
      // For example, display a message or trigger an event
      timerElement.innerHTML = "Timer has ended!";
    } else {
      // Update the data-duration attribute for the next iteration
      timerElement.setAttribute('data-duration', duration);
    }
  });
}

// Update the timers immediately
updateTimers();

// Start the timers
var timerInterval = setInterval(updateTimers, 1000);

//login
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
