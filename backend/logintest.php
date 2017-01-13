
<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "","ioii");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("ioii", $connection);
// SQL query to fetch information of registerd users and finds user match.
if($username =="admin"){
$query = mysql_query("select * from admin where Haslo='$password' AND Login='$username'", $connection);
}

else if($username[0]=="w"){
$query = mysql_query("select * from wykladowca where Haslo='$password' AND Login='$username'", $connection);
}

else if($username[0]=="s"){
$query = mysql_query("select * from student where Haslo='$password' AND Login='$username'", $connection);
}




if ($query) {

$tab = mysql_fetch_array($query);

$IDw=$tab[0];

$_SESSION['login_user']=$username; // Initializing Session
$_SESSION['IDw']=$IDw;


if($username=="admin"){
header("location: backend/admin.php"); // Redirecting To Other Page
}
else if($username[0]=="w")
{
header("location: backend/wykladowca.php"); // Redirecting To Other Page

}
else if($username[0]=="s"){
header("location: backend/student.php");

}
 
else {
$error = "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
}
}
?>