<?php
/***********
*
*	Called to place an order
*
*
************/
include_once("functions.php");
include_once("ProductConfiguration.class.php");
include_once("User.class.php");

$array_values_json = array('result' => false);
if (isset($_POST['user_id']) AND isset($_POST['product_configuration_id']))
{

	$user_connected = new User($_POST['user_id']);
	$product_configuration_displayed = new ProductConfiguration($_POST['product_configuration_id']);
	if ($user_connected->userExists() AND $product_configuration_displayed->productConfigurationExists())
	{
	
		$user_connected->addOrder($product_configuration_displayed->getProductConfigurationId());
		$array_values_json['result'] = true;
	}
}

echo json_encode($array_values_json);
?>