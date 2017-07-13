<?php

	// $execute_script = '/Applications/XAMPP/xamppfiles/htdocs/simple-toolchain-20170710075021816/htdocs/test2.php';

	function liveExecuteCommand($cmd)
	{

	    while (@ ob_end_flush()); // end all output buffers if any

	    $proc = popen("$cmd 2>&1 ; echo Exit status : $?", 'r');

	    $live_output     = "";
	    $complete_output = "";

	    while (!feof($proc))
	    {
	        $live_output     = fread($proc, 4096);
	        $complete_output = $complete_output . $live_output;
	        echo "$live_output";
	        @ flush();
	    }

	    pclose($proc);

	    // get exit status
	    preg_match('/[0-9]+$/', $complete_output, $matches);

	    // return exit status and intended output
	    return array (
	                    'exit_status'  => intval($matches[0]),
	                    'output'       => str_replace("Exit status : " . $matches[0], '', $complete_output)
	                 );
	}
	// putenv("PHANTOMJS_EXECUTABLE=/usr/local/bin/phantomjs");
	putenv("PHANTOMJS_EXECUTABLE=/home/pipeline/.npm-global/lib/node_modules/phantomjs/lib/phantom/bin/phantomjs");

	$execute_script = __DIR__ . '/test.js';
	// $execute_script = '/usr/local/bin/casperjs '.$execute_script;
	$execute_script = '/home/pipeline/.npm-global/bin/casperjs '.$execute_script;
	// var_dump(shell_exec($execute_script));
	// $result = shell_exec($execute_script);
	$result = liveExecuteCommand($execute_script);
	var_dump($result);	
?>