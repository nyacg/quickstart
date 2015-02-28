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
	<button type="submit">SUBMIT</button>
</form>