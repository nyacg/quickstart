<?php
/***********
*
*	Called to set selection
*
*
************/
include_once("functions.php");
include_once("ProductConfiguration.class.php");
include_once("Shop.class.php");
include_once("User.class.php");

$array_values_json = array('result' => false);
if (isset($_POST['user_id']) AND isset($_POST['shop_id']) AND isset($_POST['product_configuration_id']))
{
	$user_connected = new User($_POST['user_id']);
	$shop_displayed = new Shop($_POST['shop_id']);
	$product_configuration_displayed = new ProductConfiguration($_POST['product_configuration_id']);
	if ($user_connected->userExists() AND $shop_displayed->shopExists() AND $product_configuration_displayed->productConfigurationExists())
	{
		$user_connected->setSelection($shop_displayed->getShopId(), $product_configuration_displayed->getProductConfigurationId());
		$user_connected->setFavoriteShop($shop_displayed->getShopId());
		
		$array_values_json['result'] = true;
		
	}
}

echo json_encode($array_values_json);
?>