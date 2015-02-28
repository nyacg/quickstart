<?php
/***********
*
*	Called to get favorite shop
*
*
************/
include_once("functions.php");
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
		
		$array_values_json['result'] = true;
		
		$array_values_json['shop_id'] = $shop_displayed->getShopId();
		$array_values_json['shop_name'] = $shop_displayed->getName();
		$array_values_json['shop_latitude'] = $shop_displayed->getLatitude();
		$array_values_json['shop_longitude'] = $shop_displayed->getLongitude();
		$array_values_json['shop_address'] = $shop_displayed->getAddress();
		$array_values_json['shop_postcode'] = $shop_displayed->getPostCode();
		$array_values_json['shop_city'] = $shop_displayed->getCity();
		
	}
}

echo json_encode($array_values_json);
?>