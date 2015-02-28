<?php
/***********
*
*	Called to get the products & their configurations
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
		$array_selection = $user_connected->getSelection();
		$shop_displayed = new Shop($array_selection['shop_id']);
		$product_configuration_displayed = new ProductConfiguration($array_selection['product_configuration_id']);
		$product_displayed = new Product($product_configuration_displayed->getProductId());

		$array_values_json['result'] = true;
		
		$array_values_json['shop_id'] = $shop_displayed->getShopId();
		
		
	}
}

echo json_encode($array_values_json);
?>