<?php
include('session.php');

if($user_check=='admin'){

require_once("headeradmin.php");

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
$query = "SELECT *,p.Imie as imiep,p.Nazwisko as nazwiskop, r.Imie as imier, r.Nazwisko as nazwiskor FROM praca_dyplomowa  join wykladowca p on p.Id_Wykladowcy=praca_dyplomowa.Id_Promotora join wykladowca r on r.Id_Wykladowcy=praca_dyplomowa.Id_Recenzenta where praca_dyplomowa.status='Do_obrony'";



if (isset($_GET['przewodniczacy'])&&isset($_GET['id'])){ 
      $idd = $_GET['id'];
      $sql = "SELECT * FROM praca_dyplomowa WHERE Id_Pracy='$idd'"; 
      $res = mysqli_query($mysqli, $sql);
      if ($res){
        $tab = mysqli_fetch_array($res);
?>
<form action="" method="post" name="recenz">
<!-- 2d. dwa pola ukryte: -->
          <input type="hidden" name="rec" value="1">
          
<!-- 2b. Pola z aktualnymi wartościami rekordu, który będziemy zmieniać: -->
          <br><label for="Ocena">Ocena:</label> 
          <input type="text" name="ocena" >
          <br><label for="Opis">Opis:</label>
          <input type="text" name="Opis" >

          <br><br><input type="submit" value="Zapisz zmianę">
        </form>


<?php
   }
  if (isset($_POST['ocena']) && isset($_POST['rec'])){ 
      
      $ocena = $_POST['ocena'];
      $opis = $_POST['Opis'];

     
      $sql = "INSERT INTO recenzja (Ocena, Opis, Id_Pracy, Id_Wykladowcy)  VALUES ('$ocena', '$opis', '$idd', '$id_wykl')";
      $res = mysqli_query($mysqli, $sql);
       $last_id = mysqli_insert_id($mysqli);
       $sql = "UPDATE praca_dyplomowa SET Id_RecenzjaR='$last_id'  WHERE Id_Pracy='$idd'"; 
      $res = mysqli_query($mysqli, $sql);
      if ($res) {
      echo 'Rekord został dodany';
      $sql = "SELECT * FROM `praca_dyplomowa` p join recenzja r on p.Id_pracy=r.Id_Pracy WHERE p.Id_Pracy='$idd'";
      $res = mysqli_query($mysqli, $sql);
      $num_rows = $res->num_rows;
      if($num_rows==2){
        $row = $res->fetch_assoc();
        $oc1=$row["Ocena"];
        $row = $res->fetch_assoc(); 
        $oc2=$row["Ocena"];
 		    if($oc1>2&&$oc2>2){
 		   	  $sql = "UPDATE praca_dyplomowa SET status='Do_obrony' WHERE Id_Pracy='$idd'"; 
      		$res = mysqli_query($mysqli, $sql);
 		}
      	 
      }
     header("location: wykladowca.php");
 		}
    
      else echo "Modyfikacja nie powiodła się: $sql<br>" .  mysqli_error($mysqli) . "<br><br>";   
    }

}


if(isset($_GET['przewodniczacy'])&&isset($_GET['id'])){
	$idprc = $_GET['íd'];


}


if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        printf ( "

          <div class=\"Topic-Container\">
           
          <div class=\"Delete-Container\">
                <a href=\"admin.php?usun=1&amp;id=" . $row["Id_Pracy"] . "\"><img class=\"Cross\" src=\"../images/cross.png\" /></a>
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
             
             <!-- ENTER INSIDE TOPIC DESCRIPTION -->
             <div class=\"Enter-Topic\">
               
               <a href=\"admin.php?przewodniczacy=1&amp;id=" . $row["Id_Pracy"] . "\">  
                   Dodaj przewodniczacego obrony  
               </a>
              
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
<b id="logout"><a href="logout.php">Log Out</a></b>