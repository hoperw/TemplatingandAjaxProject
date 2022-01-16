/*********************
Name: Hope Watson
Coding 06
Purpose: Provides function to clear form and provide client side validation.
**********************/

function clearForm() {

    //empties the values of the inputs in form
    $("#name-input").val("");
    $("#email-input").val("");
    $("#reenter-email-input").val("");
    $("#subject-input").val("");
    $("#message-input").val("");

    //empties the inside of the #msg div tags
    $("#msg").html(""); 

}

function sendData() {

    //select div to display errors or sent message
    let msgDiv = document.getElementById("msg");
    //create XMLHttpRequest object
    const request = new XMLHttpRequest();

    //instantiates request object
    request.open('POST', 'email.php');

    //select form
    let formData = new FormData(document.getElementById("email-form"));
    //check response after sent and processed from email.php
    request.addEventListener('load', function (event) {
        if (request.responseText === "okay") {
            clearForm();
            msgDiv.innerHTML = "Your message was sent";
        } else {
            msgDiv.innerHTML = "Sorry, your email was not sent.";
        }
    });
    //display server error to user if occurs
    request.addEventListener('error', function (event) {
        if (request.statusText !== "OK") {
            msgDiv.innerHTML = "Server Error";
        }
    });
    //send the formData using the request object
    request.send(formData);

    return;
    
}

function validate() {
    
    //sets the errors for display to zero
    let errorMessage = "";

    let msgDiv = document.getElementById("msg");

    //trims the whitespace of values from each input
    let nameInput = $("#name-input").val().trim();
    let email = $("#email-input").val().trim();
    let from = $("#reenter-email-input").val().trim();
    let subject = $("#subject-input").val().trim();
    let message = $("#message-input").val().trim();

    //shows the user values that are trimmed
    $("#name-input").val(nameInput);
    $("#email").val(email);
    $("#from").val(from);
    $("#subject").val(subject);
    $("#message").val(message);
    //check for empty fields, add errors if they occur to errorMessage
    if (nameInput === "") {
        errorMessage += "Name field cannot be empty.<br>";
    };
    if (email === "") {
        errorMessage += "Email field cannot be empty.<br>";
    };
    if (from === "") {
        errorMessage += "Re-entering email is required.<br>";
    };
    if (subject === "") {
        errorMessage += "Subject field cannot be empty.<br>";
    };
    if (message === "") {
        errorMessage += "Message field cannot be empty.<br>";
    };
    //check if email fields do not match
    if (email !== from) {
        errorMessage += "Emails provided must match.<br>"
    }
    //validates email format
    if (validEmail(from) === false) {
        errorMessage += "Email was not a valid email address.";
    }
    //if there are no errors run sendData function
    if(errorMessage === "") {
        sendData();
    } else {
        //if errors occur display the errorMessage
        msgDiv.innerHTML = "The following errors occurred:<br><br>" + errorMessage;
    }

    return;
    
}

$(document).ready(function () {

    // event handler for the clear button
    $("#contact-clear").click(function () {
        clearForm();
     });
 
     //event handler for submit button
     $("#contact-submit").click(function () {
        validate();
     });
 })