<?php

/*
*	To be included on every page
*
*/

/*
*	Called in User.class.php
*/
function getDateForDatabase() {
	return gmdate('Y-m-d H:i:s', time() + 3600*date("I"));
}

/*
*
*	Compare email with password for users
*	@return	$user_id
*
*/
function checkUserEmailWithPassword($email, $password) {
	
	include("database_connection.php");
	
	$user_id = 0;
	
	$select_users_db = $db->prepare('SELECT user_id FROM users WHERE email = :email AND password = :password');
	$select_users_db->execute(array(
								'email' => $email,
								'password' => sha1($password)
								));
	if ($select_users_data_db = $select_users_db->fetch() AND 0 < $select_users_data_db['user_id'])
	{
		$user_id = 	$select_users_data_db['user_id'];
	
	}$select_users_db->closeCursor();
	
	return $user_id;
}
?>