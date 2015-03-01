<?php
/***********
*
*	Called to say an order has been received
*
*
************/
include_once("functions.php");
include_once("Shop.class.php");

$array_values_json = array('result' => false);
if (isset($_POST['shop_id']) AND isset($_POST['order_id']))
{
	$shop_displayed = new Shop($_POST['shop_id']);
	if ($shop_displayed->shopExists() AND checkOrderIdExists($_POST['order_id']))
	{
		
		setOrderIsReceived($_POST['order_id']);
		$array_values_json['result'] = true;
		
	}
	
}

echo json_encode($array_values_json);
?>