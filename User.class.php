<?php
class User {
	
	private $user_exists;
	private $user_id;
	private $first_name;
	private $last_name;
	private $email;
	private $password;
	private $datetime_registered;
	
	public function __construct($user_id) {
		
		include("database_connection.php");
		
		$select_users_db = $db->prepare('SELECT user_id, first_name, last_name, email, password, datetime_registered FROM users WHERE user_id = :user_id');
		$select_users_db->execute(array('user_id' => $user_id));
		if ($select_users_data_db = $select_users_db->fetch() AND 0 < $select_users_data_db['user_id'])
		{
			$this->user_exists = true;
			$this->user_id = $select_users_data_db['user_id'];
			$this->first_name = $select_users_data_db['first_name'];
			$this->last_name = $select_users_data_db['last_name'];
			$this->email = $select_users_data_db['email'];
			$this->password = $select_users_data_db['password'];
			$this->datetime_registered = $select_users_data_db['datetime_registered'];
		}
		else
		{
			$this->user_exists = false;
			$this->user_id = 0;
			$this->first_name = '';
			$this->last_name = '';
			$this->email = '';
			$this->password = '';
			$this->datetime_registered = '';
			
			
		} $select_users_db->closeCursor();
	}
	
	public function userExists() {
		return $this->user_exists;
	}
	
	public function getUserId() {
		return $this->user_id;
	}
	
	public function getFirstName() {
		return stripslashes($this->first_name);
	}
	
	public function getLastName() {
		return stripslashes($this->last_name);
	}
	
	public function getEmail() {
		return $this->email;
	}
	
	public function getPassword() {
		return $this->password;
	}
	
	public function getDatetimeRegistered() {
		return $this->datetime_registered;
	}
	
	public function setUserParams($first_name, $last_name, $email) {
		
		$this->first_name = htmlspecialchars($first_name);
		$this->last_name = htmlspecialchars($last_name);
		$this->email = htmlspecialchars($email);
		$update_users_bd = $bd->prepare('UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email WHERE user_id = :user_id');
		$update_users_bd->execute(array(
									'first_name' => $this->first_name,
									'last_name' => $this->last_name,
									'email' => $this->email
									));
		$update_users_bd->closeCursor();
	}
	
}
?>