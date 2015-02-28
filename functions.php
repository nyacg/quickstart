<?php

/*
*	To be included on every page
*
*/

/*
*	Called in User.class.php
*/
function getDateForDatabase() {
	return gmdate('Y-m-d H:i:s', time() + 3600*date("I"));
}

?>