<?php
class ProductConfiguration {
	
	private $product_configuration_exists;
	private $product_configuration_id;
	private $name;
	private $price;
	private $product_id;
	private $datetime_added;
	
	public function __construct($product_configuration_id) {
		
		include("database_connection.php");
		
		$select_products_configurations_db = $db->prepare('SELECT product_configuration_id, name, price, product_id, datetime_added FROM products_configurations WHERE product_configuration_id = :product_configuration_id');
		$select_products_configurations_db->execute(array('product_configuration_id' => $product_configuration_id));
		if ($select_products_configurations_data_db = $select_products_configurations_db->fetch() AND 0 < $select_products_configurations_data_db['product_configuration_id'])
		{
			$this->product_configuration_exists = true;
			$this->product_configuration_id = $select_products_configurations_data_db['product_configuration_id'];
			$this->name = $select_products_configurations_data_db['name'];
			$this->price = $select_products_configurations_data_db['price'];
			$this->product_id = $select_products_configurations_data_db['product_id'];
			$this->datetime_added = $select_products_configurations_data_db['datetime_added'];
		}
		else
		{
			$this->product_configuration_exists = false;
			$this->product_configuration_id = 0;
			$this->name = '';
			$this->price = 0.0;
			$this->product_id = 0;
			$this->datetime_added = '';
			
			
		} $select_products_configurations_db->closeCursor();
	}
	
	public function productConfigurationExists() {
		return $this->product_configuration_id;
	}
	
	public function getProductConfigurationId() {
		return $this->product_configuration_id;
	}
	
	public function getName() {
		return stripslashes($this->name);
	}
	
	public function getPrice() {
		return $this->price;
	}
	
	public function getProductId() {
		return $this->product_id;
	}
	
	public function getDatetimeAdded() {
		return stripslashes($this->datetime_added);
	}
	
}
?>