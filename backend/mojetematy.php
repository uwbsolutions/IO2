<?php
include('session.php');

if($user_check[0]=='w'){

require_once("headerwykl.php");

?>

<div class="Content-Wrapper">
  
     <!-- TOPIC LIST START -->
     <div class="Topics-List-Block">

<?php
  $mysqli = new mysqli("localhost", "root", "", "ioii");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$Idw=$_SESSION['IDw'];

$query = "SELECT *,p.Imie as imiep,p.Nazwisko as nazwiskop, r.Imie as imier, r.Nazwisko as nazwiskor FROM praca_dyplomowa  join wykladowca p on p.Id_Wykladowcy=praca_dyplomowa.Id_Promotora join wykladowca r on r.Id_Wykladowcy=praca_dyplomowa.Id_Recenzenta  where praca_dyplomowa.Id_Promotora='$Idw'";
if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        printf ( "

          <div class=\"Topic-Container\">
           
          <div class=\"Delete-Container\">
                <a href=\"admin.php?usun=1&amp;idprac=" . $row["Id_Pracy"] ."&amp;idprom=".$row['Id_Promotora']."&amp;idrec=".$row['Id_Recenzenta']. "\"><img class=\"Cross\" src=\"../images/cross.png\" /></a>
          </div>

             <div class=\"Topic\">
             %s 
               
             </div>
               
             <!-- AUTHOR OF TOPIC -->
             <div class=\"Author\">
                <p class=\"static\">Promotor:</p> 
                %s %s
             </div>
             <div class=\"Author\">
                <p class=\"static\">Recenzent:</p> 
                %s %s
             </div>

            <!-- IS THE TOPIC TAKEN? IF SO - BY WHO? -->
             <div class=\"Opis\">
                <p class=\"static\">Opis:</p>
                %s
             </div>

            <div class=\"Status\">
                <p class=\"static\">Status:</p>
                %s
             </div>
             
         </div>\n",  $row["Temat"], $row["imiep"], $row['nazwiskop'], $row["imier"], $row['nazwiskor'], $row["Opis"], $row["Status"]);
    }

    /* free result set */
    $result->free();
}









require_once("footer.php");
}
else 
	echo "Nie masz dostepu do tej strony ". "<a href='../index.php'>Homepage</a>";


?>