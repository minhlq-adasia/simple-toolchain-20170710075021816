<?php

	echo 'result:';
	$execute_script = __DIR__ . '/test.js';
	// $execute_script = 'test.js';
	putenv("PHANTOMJS_EXECUTABLE=".__DIR__."/node_modules/phantomjs/bin/phantomjs");
	// putenv("PHANTOMJS_EXECUTABLE=/Users/adasia/Desktop/minh/data/phantomjs-2.1.1-macosx/bin/phantomjs");
	// putenv('PHANTOMJS_EXECUTABLE='. __DIR__ .'/node_modules/phantomjs/bin/phantomjs'); 
	// putenv("PHANTOMJS_EXECUTABLE=/usr/local/bin/phantomjs");
	// putenv("DYLD_LIBRARY_PATH");
	// $handle = popen(__DIR__ . '/node_modules/phantomjs/bin/phantomjs --version 2>&1','r');
	// $read = stream_get_contents($handle);
	// echo $read;
	// pclose($handle);
	// shell_exec('export PATH="/Users/adasia/Desktop/minh/data/phantomjs-2.1.1-macosx/bin:$PATH"');
    $result = shell_exec(__DIR__ . "/node_modules/casperjs/bin/casperjs ".$execute_script);
    /// /Applications/XAMPP/xamppfiles/htdocs/simple-toolchain-20170710075021816/htdocs/
    
    // exec("node_modules/casperjs/bin/casperjs ".$execute_script." 2>&1",$result);

    print_r($result);

?>