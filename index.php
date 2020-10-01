<?
require 'engine/lib/dev.php';

use engine\core\router;

spl_autoload_register(function($class) {
	$path = str_replace('\\', '/', $class.".php");
	if (file_exists($path)) {
		require $path;	
	}
});

session_start();

$Router = new Router;
$Router->run();

?>