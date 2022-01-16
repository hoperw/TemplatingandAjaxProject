<?php
/*********************
Name: Hope Watson
Coding 05
Purpose: Processes data from HTML form to create a Mad Lib Title to display to the user.
**********************/

function main() {

    /* * *********************************************
    * STEP 1: INPUT: Do NOT process, just get the data.
    * Do not delete this comment,
    * ********************************************** */

    //Takes in user input from form in title.html, if input was not empty they are stored as variables
    //If any are empty the variable error message will be displayed to the user and they can try again
    if (!empty($_POST['title']) && !empty($_POST['drink']) && 
        !empty($_POST['petname']) && !empty($_POST['fictionalplace']) && 
        !empty($_POST['realplace'])) {

        $title = $_POST['title'];
        $drink = $_POST['drink'];
        $petName = $_POST['petname'];
        $fictionalPlace = $_POST['fictionalplace'];
        $realPlace = $_POST['realplace'];

    } else {
        $title = "";
        $drink = "";
        $petName = "";
        $fictionalPlace = "";
        $realPlace = "";
        echo "error";
    }

    /* * ******************************************************
    * STEP 2: VALIDATION: Always clean your input first!!!!
    * Do NOT process, only CLEAN and VALIDATE.
    * Do not delete this comment.
    * ****************************************************** */
    //Removes tags and limits characters from user input to 64 characters
    $title = strip_tags(substr(trim($title), 0, 64));
    $drink = strip_tags(substr(trim($drink), 0, 64));
    $petName = strip_tags(substr(trim($petName), 0, 64));
    $fictionalPlace = strip_tags(substr(trim($fictionalPlace), 0, 64));
    $realPlace = strip_tags(substr(trim($realPlace), 0, 64));

    if (!empty($title) && !empty($drink) && !empty($petName) &&
    !empty($fictionalPlace) && !empty($realPlace)) {

        /* * *************************************************************************
        * STEP 3 and 4: PROCESSING and OUTPUT: Notice this code only executes
        * if you have valid data from steps 1 and 2. Your code must always have
        * a saftey feature similar to this.
        * Do not delete this comment.
        * ************************************************************************ */

        //Determines lengths of user input
        $titleLength = strlen($title);
        $drinkLength = strlen($drink);
        $petNameLength = strlen($petName);
        $fictionalPlaceLength = strlen($fictionalPlace);
        $realPlaceLength = strlen($realPlace);
        $titleTotal = $titleLength + $drinkLength + $petNameLength + $fictionalPlaceLength + $realPlaceLength;

        echo $titleTotal;
    }
}

main();

?>