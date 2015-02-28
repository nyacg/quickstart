<?php
class Shop {
	
	private $shop_exists;
	private $shop_id;
	private $name;
	private $latitude;
	private $longitude;
	private $address;
	private $postcode;
	private $city;
	private $datetime_registered;
	
	public function __construct($shop_id) {
		
		include("database_connection.php");

		$select_shops_db = $db->prepare('SELECT shop_id, name, latitude, longitude, address, postcode, city, datetime_registered FROM shops WHERE shop_id = :shop_id');
		$select_shops_db->execute(array('shop_id' => $shop_id));
		if ($select_shops_data_db = $select_shops_db->fetch() AND 0 < $select_shops_data_db['shop_id'])
		{
			$this->shop_exists = true;
			$this->shop_id = $select_shops_data_db['shop_id'];
			$this->name = $select_shops_data_db['name'];
			$this->latitude = $select_shops_data_db['latitude'];
			$this->longitude = $select_shops_data_db['longitude'];
			$this->address = $select_shops_data_db['address'];
			$this->postcode = $select_shops_data_db['postcode'];
			$this->city = $select_shops_data_db['city'];
			$this->datetime_registered = $select_shops_data_db['datetime_registered'];
		}
		else
		{
			$this->shop_exists = false;
			$this->shop_id = 0;
			$this->name = '';
			$this->latitude = '';
			$this->longitude = '';
			$this->address = '';
			$this->postcode = '';
			$this->city = '';
			$this->datetime_registered = '';
			
			
		} $select_shops_db->closeCursor();
	}
	
	public function shopExists() {
		return $this->shop_exists;
	}
	
	public function getShopId() {
		return $this->shop_id;
	}
	
	public function getName() {
		return stripslashes($this->name);
	}
	
	public function getLatitude() {
		return $this->latitude;
	}
	
	public function getLongitude() {
		return $this->longitude;
	}
	
	public function getAddress() {
		return stripslashes($this->address);
	}
	
	public function getPostCode() {
		return stripslashes($this->postcode);
	}
	
	public function getCity() {
		return stripslashes($this->city);
	}
	
	public function getDatetimeRegistered() {
		return $this->datetime_registered;
	}
	
	public function getAllProductId() {
		
		include("database_connection.php");
		
		$array_product_id = array();
		
		$select_products_db = $db->prepare('SELECT product_id FROM products WHERE shop_id = :shop_id');
		$select_products_db->execute(array('shop_id' => $this->shop_id));
		while ($select_products_data_db = $select_products_db->fetch())
		{
			array_push($array_product_id, $select_products_data_db['product_id']);
			
		} $select_products_db->closeCursor();
		
		return $array_product_id;
	}
}
?>