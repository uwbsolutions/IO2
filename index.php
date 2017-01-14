<?php
require_once("backend/header.php");
require_once("backend/content.php");
require_once("backend/footer.php");
include('backend/logintest.php'); // Includes Login Script




if(isset($_SESSION['login_user'])){
	$path = $_SESSION['login_user'];

}

if(isset($path)&&$path=='admin'){
	header("location: backend/$path.php");

} 
else if(isset($path)&&$path[0]=='s'){
	header("location: backend/student.php");
}
else if(isset($path)&&$path[0]=='w'){
	header("location: backend/wykladowca.php");
}
?>