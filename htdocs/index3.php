<?php

putenv("PHANTOMJS_EXECUTABLE=".__DIR__."/node_modules/phantomjs/bin/phantomjs");

require_once 'vendor/autoload.php';

use Browser\Casper;

$casper = new Casper();

// forward options to phantomJS
// for example to ignore ssl errors
$casper->setOptions([
    'ignore-ssl-errors' => 'yes'
]);

// navigate to google web page
$casper->start('http://www.google.com');

// fill the search form and submit it with input's name
$casper->fillForm(
        'form[action="/search"]',
        array(
                'q' => 'search'
        ),
        true);

// or with javascript selectors:
// $casper->fillFormSelectors(
//         'form.form-class',
//         array(
//                 'input#email-id' => 'user-email',
//                 'input#password-id'   =>  'user-password'
//         ),true);

// wait for 5 seconds (have a coffee)
$casper->wait(5000);


// run the casper script
$casper->run();

// check the urls casper get through
var_dump($casper->getRequestedUrls());

// need to debug? just check the casper output
var_dump($casper->getOutput());

?>