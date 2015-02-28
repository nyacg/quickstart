<?php
/***********
*
*	Called to log in the user
*
*
************/
include_once("functions.php");
include_once("User.class.php");

$array_values_json = array('result' => false);
if (isset($_POST['email']) AND isset($_POST['password']) AND filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
	$user_id_connected = checkUserEmailWithPassword($_POST['email'], $_POST['password']);
	if (0 < $user_id_connected)
	{
		
		$user_connected = new User($user_id_connected);
		
		$array_values_json['result'] = true;
		$array_values_json['user_id'] = $user_connected->getUserId();
		$array_values_json['first_name'] = $user_connected->getFirstName();
		$array_values_json['last_name'] = $user_connected->getLastName();
		$array_values_json['email'] = $user_connected->getEmail();
	}
	
}

echo json_encode($array_values_json);
?>