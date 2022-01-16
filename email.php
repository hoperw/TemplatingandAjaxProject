<?php
/*********************
Name: Hope Watson
Coding 05
Purpose: Processes data from HTML form to submit contact information
**********************/

function main() {

    //if statement checks if user email is in correct email format
    //validates form values are not empty
    if (!empty($_POST['name']) && !empty($_POST['from']) && filter_var($_POST['from'], FILTER_VALIDATE_EMAIL) && !empty($_POST['subject']) 
        && !empty($_POST['message'])) {
        
        //stores user input if valid
        $name = $_POST['name'];
        $from = $_POST['from'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        //cleans values to eliminate white space, html tags, and limits lengths of input
        $name = strip_tags(substr(trim($name), 0, 64));
        $subject = strip_tags(substr(trim($subject), 0, 64));
        $message = strip_tags(substr(trim($message), 0, 1000));


        //validates that variables are not empty
        if (!empty($name) && !empty($from) && !empty($subject) && !empty($message)) {

            //creates email header for email function
            $headers = "From: $from\r\n";
            $headers .= "Reply-To: $from\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";

            $to = "hope.watson@g.austincc.edu";

            //if the email sends using above information return success page, else return failure page
            if (mail($to, $subject, $message, $headers)) {
                echo "okay";
            } else {
                echo "error";
            }
        } else {
                echo "error";
        }
    } else {
        echo "error";
    }
}


main();

?>