<?php 

$myfile = fopen('example.txt', 'r') or die('Unable to open file');
$example = fread($myfile, filesize($_SERVER["PHP_SELF"]));
fclose($myfile);

$myfile = fopen($_SERVER["PHP_SELF"], 'r') or die('Unable to open file');
$newfile = fread($myfile, filesize($_SERVER["PHP_SELF"]));
fclose($myfile);

$myfile = fopen('newfile.php', 'a+') or die ('Unable to open file');
fwrite($myfile, $newfile);
fwrite($myfile, "/*");
fwrite($myfile, $example);
fwrite($myfile, "*/");
fclose($myfile);

echo readfile('newfile.php')."\n\n";/*AJAX = Asynchronous JavaScript and XML
CSS = Cascading Style Sheets
HTML = Hyper Text Markup Language
PHP = PHP Hypertext Preprocessor
SQL = Structured Query Language
SVG = Scalable Vector Graphics
XML = EXtensible Markup Language*/