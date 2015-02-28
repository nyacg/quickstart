<?php
class Product {
	
	private $product_exists;
	private $product_id;
	private $name;
	private $shop_id;
	private $picture;
	private $datetime_added;
	
	public function __construct($product_id) {
		
		include("database_connection.php");
		
		$select_products_db = $db->prepare('SELECT product_id, name, shop_id, picture, datetime_added FROM products WHERE product_id = :product_id');
		$select_products_db->execute(array('product_id' => $product_id));
		if ($select_products_data_db = $select_products_db->fetch() AND 0 < $select_products_data_db['product_id'])
		{
			$this->product_exists = true;
			$this->product_id = $select_products_data_db['product_id'];
			$this->name = $select_products_data_db['name'];
			$this->shop_id = $select_products_data_db['shop_id'];
			$this->picture = $select_products_data_db['picture'];
			$this->datetime_added = $select_products_data_db['datetime_added'];
		}
		else
		{
			$this->product_exists = false;
			$this->product_id = 0;
			$this->name = '';
			$this->shop_id = 0;
			$this->picture = '';
			$this->datetime_added = '';
			
			
		} $select_products_db->closeCursor();
	}
	
	public function productExists() {
		return $this->product_exists;
	}
	
	public function getProductId() {
		return $this->product_id;
	}
	
	public function getName() {
		return stripslashes($this->name);
	}
	
	public function getShopId() {
		return $this->shop_id;
	}
	
	public function getPicture() {
		return $this->picture;
	}
	
	public function getDatetimeAdded() {
		return stripslashes($this->datetime_added);
	}
	
	public function getAllIdProductConfiguration() {
		
		include("database_connection.php");
		
		$array_id_product_configuration = array();
		
		$select_products_configurations_db = $db->prepare('SELECT product_configuration_id FROM products_configurations WHERE product_id = :product_id');
		$select_products_configurations_db->execute(array(
														'product_id' => $this->product_id
														));
		while ($select_products_configurations_data_db = $select_products_configurations_db->fetch())
		{
			array_push($array_id_product_configuration, $select_products_configurations_data_db['product_configuration_id']);
			
		} $select_products_configurations_db->closeCursor();
		
		return $array_id_product_configuration;
	}
}
?>