<?php
if (strtoupper(substr(gethostname(), 0, 6)) === 'NOSOUP') {
    //echo 'This is a server using Windows!';
    $db = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => 'tony',
    'database' => 'nhs_library_checkio');


} else {
    //echo 'This is a server not using Windows!';
	$db = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => 'vikingso1',
    'database' => 'nhs_library_checkio');
}

?>