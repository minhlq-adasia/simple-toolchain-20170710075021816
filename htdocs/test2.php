<?php

	echo 'result:';
	$execute_script = '/Applications/XAMPP/xamppfiles/htdocs/simple-toolchain-20170710075021816/htdocs/test.js';
    $result = shell_exec("casperjs ".$execute_script);
    echo $result;

?>