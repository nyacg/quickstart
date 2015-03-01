<?php
/***********
*
*	Called to place an order
*
*
************/
include_once("functions.php");
include_once("Product.class.php");
include_once("ProductConfiguration.class.php");
include_once("Shop.class.php");
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
		$array_values_json['shop_name'] = $shop_displayed->getName();
		$array_values_json['shop_latitude'] = $shop_displayed->getLatitude();
		$array_values_json['shop_longitude'] = $shop_displayed->getLongitude();
		$array_values_json['shop_address'] = $shop_displayed->getAddress();
		$array_values_json['shop_postcode'] = $shop_displayed->getPostCode();
		$array_values_json['shop_city'] = $shop_displayed->getCity();
		
		$array_values_json['product_id'] = $product_displayed->getProductId();
		$array_values_json['product_name'] = $product_displayed->getName();
		
		$array_values_json['product_configuration_id'] = $product_configuration_displayed->getProductConfigurationId();
		$array_values_json['product_configuration_name'] = $product_configuration_displayed->getName();
		$array_values_json['product_configuration_price'] = $product_configuration_displayed->getPrice();
		
		$array_values_json['selection_comment'] = getCommentSelection($shop_displayed->getShopId(), $user_connected->getUserId());
	}
}

echo json_encode($array_values_json);
?>