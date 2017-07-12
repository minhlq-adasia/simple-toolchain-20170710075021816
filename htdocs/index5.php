<?php
	require_once 'vendor/autoload.php';
	
	use Cocur\BackgroundProcess\BackgroundProcess;

	$execute_script = __DIR__ . '/test.js';
	// $execute_script = __DIR__."/node_modules/casperjs/bin/casperjs ".$execute_script; 

	$execute_script = '/Applications/XAMPP/xamppfiles/bin/php '.__DIR__.'/index2.php';

	$process = new BackgroundProcess($execute_script);
	$process->run();

	echo sprintf('Crunching numbers in process %d', $process->getPid());
	while ($process->isRunning()) {
	    echo '.';
	    sleep(1);
	}
	echo "\nDone.\n";
?>