/*********************
Name: Hope Watson
Coding 06
Purpose: Provides client side input validation for title generator page
**********************/

//clears form inputs
function clearForm() {

    //selects and clears the input values of the form
    $("#title-input").val("");
    $("#drink-input").val("");
    $("#pet-input").val("");
    $("#fictional-place-input").val("");
    $("#real-place-input").val("");
    $("#email-input").val("");

    //empties the inside of the #msg div tags
    $("#msg").html(""); 

}

function sendData() {
    //select element to display message to user
    let msgDiv = document.getElementById("msg");
    //create a form data object to use in ajax
    let form = document.getElementById("title-generator-form");
    let formData = new FormData(form);

    $.ajax({
        url: 'process.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(val) {
            if (val !== "error") {
                clearForm();
                if (val > 30) {
                    msgDiv.innerHTML = "That's a heck of a title!";
                } else if (val <= 30) {
                    msgDiv.innerHTML = "That's a cute little title!";
                }      
            } else {
                msgDiv.innerHTML = "Sorry your title was not processed.";
            }
        },
        error: function() {
            msgDiv.innerHTML = "Server Error";
        }    
    });

    return;
}

//validates other inputs to check if they are empty, runs email validating function
function validate() {

    let errorMessage = "";

    let msgDiv = document.getElementById("msg");

    //sets inputs to later access their values to validate
    let titleInput = $("#title-input").val().trim();
    let drinkInput = $("#drink-input").val().trim();
    let petInput = $("#pet-input").val().trim();
    let fictionalPlaceInput = $("#fictional-place-input").val().trim();
    let realPlaceInput = $("#real-place-input").val().trim();
    let emailInput = $("#email-input").val().trim();
    
    //shows the user values that are trimmed
    $("#titleInput").val(titleInput);
    $("#drinkInput").val(drinkInput);
    $("#petInput").val(petInput);
    $("#fictionalPlaceInput").val(fictionalPlaceInput);
    $("#realPlaceInput ").val(realPlaceInput);
    $("#emailInput ").val(emailInput);


    if (titleInput === "") {
        errorMessage += "Title cannot be empty.<br>";
    };
    if (drinkInput === "") {
        errorMessage += "Favorite drink cannot be empty.<br>";
    };
    if (petInput === "") {
        errorMessage += "Pet name cannot be empty.<br>";
    };
    if (fictionalPlaceInput === "") {
        errorMessage += "Fictional place cannot be empty.<br>";
    };
    if (realPlaceInput === "") {
        errorMessage += "Real place cannot be empty.<br>";
    };
    //ensures fictional and real place are different values
    if (fictionalPlaceInput === realPlaceInput) {
        errorMessage += "The real place and fictional place must be different.<br>"
    }
    //validates email
    if (validEmail(emailInput) === false) {
        errorMessage += "Email was not a valid email address.";
    }
    //if there are no error messages send the data to the server
    if (errorMessage === "") {
        sendData();
    } else {
        msgDiv.innerHTML = "The following errors occurred: <br><br>" + errorMessage;
    }

    return;
    
}

$(document).ready(function() {

    $("#clear-button").click(function () {
        clearForm();
    });

    $("#submit-button").click(function () { 
        validate();
    });

});

