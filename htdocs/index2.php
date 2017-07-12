<?php

	// $execute_script = '/Applications/XAMPP/xamppfiles/htdocs/simple-toolchain-20170710075021816/htdocs/test2.php';
	// // $execute_script = '/home/pipeline/231accdf-ca3f-43c1-a53b-f6a9d1d1db14/htdocs/test.js';
 //    $result = shell_exec("/Applications/XAMPP/xamppfiles/bin/php ".$execute_script);
 //    echo $result;
	/**
	 * Execute the given command by displaying console output live to the user.
	 *  @param  string  cmd          :  command to be executed
	 *  @return array   exit_status  :  exit status of the executed command
	 *                  output       :  console output of the executed command
	 */
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

	// $execute_script = __DIR__ . '/test2.php';

 //    $result = liveExecuteCommand("/Applications/XAMPP/xamppfiles/bin/php ".$execute_script);
 //    // $result = liveExecuteCommand("php ".$execute_script);
 //    print_r($result);

    $execute_script = __DIR__ . '/test.js';
    // $execute_script = 'test.js';
    putenv("PHANTOMJS_EXECUTABLE=".__DIR__."/node_modules/phantomjs/bin/phantomjs");
    // $result = shell_exec(__DIR__ . "/node_modules/casperjs/bin/casperjs ".$execute_script);
    // print_r($result);

    $execute_script = "node_modules/casperjs/bin/casperjs ".$execute_script; 
    $result = liveExecuteCommand($execute_script);
    print_r($result);

 //    $cmd = "node_modules/casperjs/bin/casperjs test.js";

 // 	while (@ ob_end_flush()); // end all output buffers if any

	// $proc = popen($cmd, 'r');
	// echo '<pre>';
	// while (!feof($proc))
	// {
	//     echo fread($proc, 4096);
	//     @ flush();
	// }
	// echo '</pre>';
?>