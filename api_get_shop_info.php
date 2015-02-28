<?php
/***********
*
*	Called to get the info on a shop
*
*
************/
include_once("functions.php");
include_once("Shop.class.php");

$array_values_json = array('result' => false);
if (isset($_POST['shop_id']))
{

	$shop_displayed = new Shop($_POST['shop_id']);
	if ($shop_displayed->shopExists())
	{

		$array_values_json = array('result' => false);
		if (isset($_POST['shop_id']))
		{
		
			$shop_displayed = new Shop($_POST['shop_id']);
			if ($shop_displayed->shopExists())
			{
		
				$array_values_json['result'] = true;
				
				$array_values_json['shop_id'] = $shop_displayed->getShopId();
				$array_values_json['name'] = $shop_displayed->getName();
				$array_values_json['latitude'] = $shop_displayed->getLatitude();
				$array_values_json['longitude'] = $shop_displayed->getLongitude();
				$array_values_json['address'] = $shop_displayed->getAddress();
				$array_values_json['postcode'] = $shop_displayed->getPostCode();
				$array_values_json['city'] = $shop_displayed->getCity();
				
			}
		}
	}
}
echo json_encode($array_values_json);
?>