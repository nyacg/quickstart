<?php
/***********
*
*	Called to set favorite shop
*
*
************/
include_once("functions.php");
include_once("ProductConfiguration.class.php");
include_once("Shop.class.php");
include_once("User.class.php");

$array_values_json = array('result' => false);
if (isset($_POST['user_id']) AND isset($_POST['shop_id']))
{
	$user_connected = new User($_POST['user_id']);
	$shop_displayed = new Shop($_POST['shop_id']);
	if ($user_connected->userExists() AND $shop_displayed->shopExists())
	{
		$user_connected->setFavoriteShop($shop_displayed->getShopId());
		
		$array_values_json['result'] = true;
		
	}
}

echo json_encode($array_values_json);
?>