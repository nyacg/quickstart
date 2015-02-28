<?php
/***********
*
*	Called to get the list of orders
*
*
************/
include_once("functions.php");
include_once("Product.class.php");
include_once("Shop.class.php");

$array_values_json = array('result' => false);
if (isset($_POST['shop_id']))
{
	$shop_displayed = new Shop($_POST['shop_id']);
	if ($shop_displayed->shopExists())
	{

		$array_values_json['result'] = true;
		
		$array_orders = $shop_displayed->getOrders();
		foreach ($array_orders AS $array_order_in_loop)
		{
			
			$product_in_loop = new Product($array_order_in_loop['product_configuration_product_id']);
			
			$sign_timestamp = '';
			$timestamp_now = strtotime(getDateForDatabase());
			$timestamp_datetime_ordered = strtotime($array_order_in_loop['datetime_ordered']);
			if ($timestamp_now > $timestamp_datetime_ordered)
			{
				$sign_timestamp = '-';
			}
			$time_remaining = $sign_timestamp . gmdate('H:i', $timestamp_now - $timestamp_datetime_ordered);
			array_push($array_values_json, array(
												'product_name' => $product_in_loop->getName() . ' (' . $array_order_in_loop['product_configuration_name'] . ')',
												'product_price' => $array_order_in_loop['product_configuration_price'],
												'order_time' => $array_order_in_loop['order_time'],
												'time_remaining' => $time_remaining
												));
		}
		
	}
}

echo json_encode($array_values_json);
?>