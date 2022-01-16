<?php
/*********************
Name: Hope Watson
Coding 03
Purpose: Processes data from HTML form to create a Mad Lib Title to display to the user.
**********************/

//loads the mustache template library
require_once 'mustache/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();

//creates a new mustache template engine
$mustache = new Mustache_Engine;

//loads header, footer, and body template into strings
$header = file_get_contents('templates/header.html');
$body = file_get_contents('templates/title.html');
$footer = file_get_contents('templates/footer.html');

//variables to include in form, intended to be customizable so form questions could be altered easily
$formInstructions = "Enter your information and click submit to see your title!";
$input1 = "Your Title";
$input2 = "Your Favorite Drink";
$input3 = "Your Pet's Name";
$input4 = "Your Favorite Fictional Place";
$input5 = "Your Favorite Real Place";
$input6 = "Your Email";

//header data for all headers on site
$header_data = ["pagetitle" => "Title Generator", "homelink" => "Home", 
"titlemakerlink" => "Title Maker", "contactlink" => "Contact", "logo" => "Title Generator"];

//body data to be loaded for form site, title.html
$body_data = ["forminstructions" => $formInstructions, "input1" => $input1, "input2" => $input2,
             "input3" => $input3, "input4" => $input4, "input5" => $input5, "input6" => $input6];

//footer data for all footers on site
$footer_data = ["footertitle" => "Title Generator"];


//combines variables with templates to create each page
echo $mustache->render($header, $header_data) . PHP_EOL;
echo $mustache->render($body, $body_data) . PHP_EOL;
echo $mustache->render($footer, $footer_data) . PHP_EOL;
?>
