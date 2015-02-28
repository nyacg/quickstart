<?php
/*
*	Allow to test the API
*
*/
?>

<h1>LOGIN</h1>
<form method="post" action="api_login.php">
	<label for="email">email</label><input type="input" name="email" id="email" value="ron.danenberg@gmail.com" /><br />
	<label for="password">password</label><input type="password" name="password" id="password" value="12345" /><br />
	<button type="submit">SUBMIT</button>
</form>

<hr />

<h1>ORDER</h1>
<form method="post" action="api_order.php">
	<label for="user_id">user_id</label><input type="input" name="user_id" id="user_id" value="1" /><br />
	<label for="product_configuration_id">product_configuration_id</label><input type="input" name="product_configuration_id" id="product_configuration_id" value="1" /><br />
	<label for="datetime_ordered">datetime_ordered</label><input type="input" name="datetime_ordered" id="datetime_ordered" value="2014-03-01 20:00:00" /><br />
	<button type="submit">SUBMIT</button>
</form>

<hr />

<h1>GET SELECTION</h1>
<form method="post" action="api_get_selection.php">
	<label for="user_id">user_id</label><input type="input" name="user_id" id="user_id" value="1" /><br />
	<button type="submit">SUBMIT</button>
</form>

<hr />

<h1>SET SELECTION</h1>
<form method="post" action="api_set_selection.php">
	<label for="user_id">user_id</label><input type="input" name="user_id" id="user_id" value="1" /><br />
	<label for="shop_id">shop_id</label><input type="input" name="shop_id" id="shop_id" value="1" /><br />	
	<label for="product_configuration_id">product_configuration_id</label><input type="input" name="product_configuration_id" id="product_configuration_id" value="1" /><br />
	<button type="submit">SUBMIT</button>
</form>

<hr />

<h1>SET FAVORITE SHOP</h1>
<form method="post" action="api_set_favorite_shop.php">
	<label for="user_id">user_id</label><input type="input" name="user_id" id="user_id" value="1" /><br />
	<label for="shop_id">shop_id</label><input type="input" name="shop_id" id="shop_id" value="1" /><br />	
	<button type="submit">SUBMIT</button>
</form>

<hr />

<h1>GET FAVORITE SHOP</h1>
<form method="post" action="api_get_favorite_shop.php">
	<label for="user_id">user_id</label><input type="input" name="user_id" id="user_id" value="1" /><br />
	<button type="submit">SUBMIT</button>
</form>

<hr />

<h1>GET ALL SHOPS</h1>
<form method="post" action="api_get_all_shops.php">
	<label for="user_id">user_id</label><input type="input" name="user_id" id="user_id" value="1" /><br />
	<button type="submit">SUBMIT</button>
</form>

<hr />

<h1>GET PRODUCTS</h1>
<form method="post" action="api_get_products.php">
	<label for="user_id">user_id</label><input type="input" name="user_id" id="user_id" value="1" /><br />
	<button type="submit">SUBMIT</button>
</form>

<hr />
<hr />
<hr />
<h1 style="background-color:black;color:white;">FOR ROBERT (coffee shop side)</h1>
<hr />
<hr />

<h1>GET SHOP INFO</h1>
<form method="post" action="api_get_shop_info.php">
	<label for="shop_id">shop_id</label><input type="input" name="shop_id" id="shop_id" value="1" /><br />
	<button type="submit">SUBMIT</button>
</form>

<hr />

<h1>GET ORDERS</h1>
<form method="post" action="api_get_orders.php">
	<label for="shop_id">shop_id</label><input type="input" name="shop_id" id="shop_id" value="1" /><br />
	<button type="submit">SUBMIT</button>
</form>