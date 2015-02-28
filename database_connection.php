<?php
try
{
	/* PDO */
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$db = new PDO('mysql:host=localhost;dbname=ron101_quickstart', 'ron101_quickstar', 'I__T]Cz8{Z7*', $pdo_options);
	$db->exec("SET CHARACTER SET utf8"); 	
}
catch (Exception $e)
{
		die('Please contact an admin asap ! Error connecting to the database : ' . $e->getMessage() );
}
?>