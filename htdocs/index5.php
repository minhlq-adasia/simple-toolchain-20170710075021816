<?php
require("vendor/autoload.php");
use Browser\Casper;
$casper = new Casper();
//May need to set more options due to ssl issues
$casper->setOptions(array('ignore-ssl-errors' => 'yes'));
$casper->start('https://www.google.com');
$casper->wait(5000);
$output = $casper->getOutput();
$casper->run();
$html = $casper->getHtml();
echo $html;
?>