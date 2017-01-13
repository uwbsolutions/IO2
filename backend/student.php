<?php


include('session.php');
if($user_check[0]=='s'){

require_once("header.php");
require_once("studentcontainer.php");
require_once("footer.php");
}
else 
	echo "Nie masz dostepu do tej strony ". "<a href='../index.php'>Homepage</a>";


?>
<b id="logout"><a href="logout.php">Log Out</a></b>