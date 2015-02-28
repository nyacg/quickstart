<?php
/***********
*
*	Called to get the list of products
*
*
************/
include_once("functions.php");
include_once("Product.class.php");
include_once("ProductConfiguration.class.php");
include_once("User.class.php");

$array_values_json = array('result' => false);
if (isset($_POST['user_id']))
{
	$user_connected = new User($_POST['user_id']);
	if ($user_connected->userExists())
	{
		
		$array_values_json['result'] = true;
		
		$array_products = getAllProducts();
		foreach ($array_products AS $product_in_loop)
		{
			$array_in_loop = array();
			$array_in_loop['product_id'] = $product_in_loop['product_id'];
			$array_in_loop['name'] = $product_in_loop['name'];
			$array_in_loop['picture'] = $product_in_loop['picture'];
			
			$product = new Product($array_in_loop['product_id']);
			$array_product_configuration_id = $product->getAllIdProductConfiguration();

			foreach ($array_product_configuration_id AS $product_configuration_id_in_loop)
			{
				$product_configuration_in_loop = new ProductConfiguration($product_configuration_id_in_loop);
				$array_product_conf = array();
				$array_product_conf['product_configuration_id'] = $product_configuration_in_loop->getProductConfigurationId();
				$array_product_conf['product_configuration_name'] = $product_configuration_in_loop->getName();
				$array_product_conf['product_configuration_price'] = $product_configuration_in_loop->getPrice();
				
				$array_in_loop[$product_configuration_in_loop->getProductConfigurationId()] = $array_product_conf;
			}
			
			array_push($array_values_json, $array_in_loop);
		}
	}
}

echo json_encode($array_values_json);
?>