<?php
/*********************
Name: Hope Watson
Coding 04
Purpose: Processes data from HTML form to create a Mad Lib Title to display to the user.
**********************/

//loads the mustache template library
require_once 'mustache/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();

//creates a new mustache template engine
$mustache = new Mustache_Engine;

//loads header, footer, and body template into strings
$header = file_get_contents('templates/header.html');
$body = file_get_contents('templates/contact.html');
$footer = file_get_contents('templates/footer.html');

//variables to include in form, intended to be customizable so form questions could be altered easily
$contactInstructions = "Contact us and let us know your thoughts!";
$name = "Your Name";
$email = "Your Email";
$reenteremail = "Re-enter Email";
$subject = "Your Subject";
$message = "Leave a message";
$button1 = "Submit";
$button2 = "Clear";

//header data for all headers on site
$header_data = ["pagetitle" => "Title Generator", "homelink" => "Home", 
"titlemakerlink" => "Title Maker", "contactlink" => "Contact", "logo" => "Title Generator"];

//body data to be loaded for form site, title.html
$body_data = ["contactInstructions" => $contactInstructions, "name" => $name, 
             "email" => $email, "reenteremail" => $reenteremail, "subject" => $subject, 
             "message" => $message, "button1" => $button1, "button2" => $button2];

//footer data for all footers on site
$footer_data = ["footertitle" => "Title Generator"];


//combines variables with templates to create each page
echo $mustache->render($header, $header_data) . PHP_EOL;
echo $mustache->render($body, $body_data) . PHP_EOL;
echo $mustache->render($footer, $footer_data) . PHP_EOL;
?>
