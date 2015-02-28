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
	
	public function setPassword($password) {
		
		$this->password = sha1($password);
		$update_users_bd = $bd->prepare('UPDATE users SET password = :password WHERE user_id = :user_id');
		$update_users_bd->execute(array(
									'password' => $this->password,
									'user_id' => $this->user_id
									));
		$update_users_bd->closeCursor();
	}
	
	public function setUserParams($first_name, $last_name, $email) {
		
		$this->first_name = htmlspecialchars($first_name);
		$this->last_name = htmlspecialchars($last_name);
		$this->email = htmlspecialchars($email);
		$update_users_bd = $bd->prepare('UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email WHERE user_id = :user_id');
		$update_users_bd->execute(array(
									'first_name' => $this->first_name,
									'last_name' => $this->last_name,
									'email' => $this->email,
									'user_id' => $this->user_id
									));
		$update_users_bd->closeCursor();
	}
	
	/*
	*
	*	From table 'favorite_shops' but returns shop_id to go faster
	*	It is an array, so easier to change in the future when multiple shops
	*/
	public function getAllIdShop() {
		
		include("database_connection.php");
		
		$array_shop_id = array();
		
		$select_favortie_shops_db = $db->prepare('SELECT shop_id FROM favorite_shops WHERE user_id = :user_id');
		$select_favortie_shops_db->execute(array('user_id' => $this->user_id));
		while ($select_favortie_shops_data_db = $select_favortie_shops_db->fetch())
		{
			array_push($array_shop_id, $select_favortie_shops_data_db['shop_id']);		

		} $select_favortie_shops_db->closeCursor();
		
		return $array_shop_id;
	}
	
	/*
	*
	*	@return	array('shop_id' => $shop_id, 'product_configuration_id' => $product_configuration_id)
	*/
	public function getSelection() {
		
		include("database_connection.php");
		
		$array = array();
		
		$select_selections_db = $db->prepare('SELECT shop_id, product_configuration_id FROM selections WHERE user_id = :user_id');
		$select_selections_db->execute(array(
											'user_id' => $this->user_id
											));
		if ($select_selections_data_db = $select_selections_db->fetch() AND 0 < $select_selections_data_db['shop_id'])
		{
			$array = array('shop_id' => $select_selections_data_db['shop_id'], 'product_configuration_id' => $select_selections_data_db['product_configuration_id']);
		
		} $select_selections_db->closeCursor();
		
		return $array;
	}
	
	public function addOrder($product_configuration_id) {
		
		include("database_connection.php");
		
		$insert_order_db = $db->prepare('INSERT INTO orders(product_configuration_id, user_id, is_received, datetime_ordered)
													VALUES(:product_configuration_id, :user_id, :is_received, :datetime_ordered)');
		$insert_order_db->execute(array(
									'product_configuration_id' => $product_configuration_id,
									'user_id' => $this->user_id,
									'is_received' => 0,
									'datetime_ordered' => getDateForDatabase()
									));
		$insert_order_db->closeCursor();
	}
}
?>