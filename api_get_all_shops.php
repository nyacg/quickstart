<?php
/***********
*
*	Called to get the list of all the shops and their infos
*
*
************/
include_once("functions.php");
include_once("Shop.class.php");
include_once("User.class.php");

$array_values_json = array('result' => false);
if (isset($_POST['user_id']))
{
	$user_connected = new User($_POST['user_id']);
	if ($user_connected->userExists())
	{
		
		$array_values_json['result'] = true;
		
		$array_shops = getAllShops();
		
		foreach ($array_shops AS $shop_in_loop)
		{
			$array_in_loop = array();
			$array_in_loop['shop_id'] = $shop_in_loop['shop_id'];
			$array_in_loop['shop_name'] = $shop_in_loop['name'];
			$array_in_loop['shop_latitude'] = $shop_in_loop['latitude'];
			$array_in_loop['shop_longitude'] = $shop_in_loop['longitude'];
			$array_in_loop['shop_address'] = $shop_in_loop['address'];
			$array_in_loop['shop_postcode'] = $shop_in_loop['postcode'];
			$array_in_loop['shop_city'] = $shop_in_loop['city'];
			
			array_push($array_values_json, $array_in_loop);
		}
	}
}

echo json_encode($array_values_json);
?>