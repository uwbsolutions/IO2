<?php
include('session.php');
if($user_check[0]=='w'){

require_once("headerwykl.php");


























require_once("footer.php");
//echo $_SESSION["IDw"];
}
else 
	echo "Nie masz dostepu do tej strony ". "<a href='../index.php'>Homepage</a>";

?>
<b id="logout"><a href="logout.php">Log Out</a></b>