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

/*
*	Called in api_get_all_shops.php
*/
function getAllShops() {
	
	include("database_connection.php");
	
	$array_shops = array();
	
	$select_shops_db = $db->query('SELECT shop_id, name, latitude, longitude, address, postcode, city FROM shops');
	while ($select_shops_data_db = $select_shops_db->fetch())
	{
		array_push($array_shops, array(
									'shop_id' => $select_shops_data_db['shop_id'],
									'name' => stripslashes($select_shops_data_db['name']),
									'latitude' => $select_shops_data_db['latitude'],
									'longitude' => $select_shops_data_db['longitude'],
									'address' => $select_shops_data_db['address'],
									'postcode' => stripslashes($select_shops_data_db['postcode']),
									'city' => stripslashes($select_shops_data_db['city'])
									));
	
	} $select_shops_db->closeCursor();

	return $array_shops;
}

/*
*	Called in api_get_products.php
*/
function getAllProducts() {
	
	include("database_connection.php");
	
	$array_products = array();
	
	$select_products_db = $db->query('SELECT product_id, name, shop_id, picture FROM products');
	while ($select_products_data_db = $select_products_db->fetch())
	{
		array_push($array_products, array(
									'product_id' => $select_products_data_db['product_id'],
									'name' => stripslashes($select_products_data_db['name']),
									'picture' => $select_products_data_db['product_id']
									));
	
	} $select_products_db->closeCursor();

	return $array_products;
}

/*
*	Called in api_order_is_received.php
*/
function checkOrderIdExists($order_id) {
	
	include("database_connection.php");
	
	$order_exists = false;
	
	$select_orders_db = $db->prepare('SELECT order_id FROM orders WHERE order_id = :order_id');
	$select_orders_db->execute(array(
								'order_id' => $order_id
								));
	if ($select_orders_data_db = $select_orders_db->fetch() AND 0 < $select_orders_data_db['order_id'])
	{
		$order_exists = true;
	
	}$select_orders_db->closeCursor();
	
	return $order_exists;
}

/*
*	Called in api_order_is_received.php
*/
function setOrderIsReceived($order_id) {
	
	include("database_connection.php");
	
	$update_orders_db = $db->prepare('UPDATE orders SET is_received = :is_received WHERE order_id = :order_id');
	$update_orders_db->execute(array(
								'is_received' => 1,
								'order_id' => $order_id
								));
	$update_orders_db->closeCursor();
}
?>