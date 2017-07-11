<?php

	echo 'result:';
	$execute_script = __DIR__ . '/test.js';
    $result = shell_exec(__DIR__ . "/casperjs/bin/casperjs ".$execute_script);
    echo $result;

?>