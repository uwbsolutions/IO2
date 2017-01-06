
<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("ioii", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User

if($user_check=="admin"){
$ses_sql=mysql_query("select * from admin where Login='$user_check'", $connection);
}

else if($user_check[0]=="w"){
$ses_sql=mysql_query("select * from wykladowca where Login='$user_check'", $connection);
}

else if($user_check[0]=="s"){
$ses_sql=mysql_query("select * from student where Login='$user_check'", $connection);
}

$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['Login'];
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: logout.php'); // Redirecting To Home Page
}
?>