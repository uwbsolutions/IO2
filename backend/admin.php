<?php
include('session.php');

if($user_check=='admin'){

require_once("headeradmin.php");
require_once("admincontainer.php");
require_once("footer.php");
}
else 
	echo "Nie masz dostepu do tej strony ". "<a href='../index.php'>Homepage</a>";


?>
<b id="logout"><a href="logout.php">Log Out</a></b>