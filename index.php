<?php
/*********************
Name: Hope Watson
Coding 03
Purpose: Displays a home page with default information about title generator site
**********************/

//loads the mustache template library
require_once 'mustache/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();

//creates a new mustache template engine
$mustache = new Mustache_Engine;

//loads your header, footer, and body template into strings
$header = file_get_contents('templates/header.html');
$body = file_get_contents('templates/home.html');
$footer = file_get_contents('templates/footer.html');

//variables for body_data array

$bodyText1 = <<<TEXT
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mi diam, 
sollicitudin scelerisque iaculis quis, pellentesque vel nunc. Intege quam orci, scelerisque 
ac elit quis, luctus maximus nunc. Vestibulum eleifend imperdiet lectus, rhoncus varius dolor 
efficitur eu. Proin vestibulum leo at malesuada fringilla. In posuere sodales magna vel tincidunt. 
Donec pharetra mi sit amet risus molestie posuere. Pellentesque lobortis tempus tortor. Vestibulum 
luctus, risus id hendrerit blandit, odio sapien sagittis ante, in viverra dui sem quis lacus. Nulla 
rutrum lacus libero, non accumsan arcu accumsan eu. Nunc faucibus dolor nec nisi sollicitudin, ac 
dapibus mi rhoncus. Interdum et malesuada fames ac ante ipsum primis in faucibus. 
Maecenas vitae massa neque. Sed eleifend felis dui, vitae pellentesque tellus volutpat quis.
TEXT;

$bodyText2 = <<<TEXT
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mi diam, 
sollicitudin scelerisque iaculis quis, pellentesque vel nunc. Intege quam orci, scelerisque 
ac elit quis, luctus maximus nunc. Vestibulum eleifend imperdiet lectus, rhoncus varius dolor 
efficitur eu. Proin vestibulum leo at malesuada fringilla. In posuere sodales magna vel tincidunt. 
Donec pharetra mi sit amet risus molestie posuere. Pellentesque lobortis tempus tortor. Vestibulum 
luctus, risus id hendrerit blandit, odio sapien sagittis ante, in viverra dui sem quis lacus. Nulla 
rutrum lacus libero, non accumsan arcu accumsan eu. Nunc faucibus dolor nec nisi sollicitudin, ac 
dapibus mi rhoncus. Interdum et malesuada fames ac ante ipsum primis in faucibus. 
Maecenas vitae massa neque. Sed eleifend felis dui, vitae pellentesque tellus volutpat quis.
TEXT;

//header data common for all pages
$header_data = ["pagetitle" => "Title Generator", "homelink" => "Home", 
               "titlemakerlink" => "Title Maker", "contactlink" => "Contact", "logo" => "Title Generator"];

//data specific to be displayed on home.html
$body_data = ["bodytitle" => "Welcome to the Title Generator!",
             "bodytext1" => $bodyText1, "bodytext2" => $bodyText2];

//footer data common for all pages
$footer_data = ["footertitle" => "Title Generator"];

//renders header, body, and footer data to be displayed as a complete webpage
echo $mustache->render($header, $header_data) . PHP_EOL;
echo $mustache->render($body, $body_data) . PHP_EOL;
echo $mustache->render($footer, $footer_data) . PHP_EOL;

?>