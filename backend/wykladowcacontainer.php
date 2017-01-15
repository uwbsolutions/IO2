 <!-- MAIN CONTENT WRAPPER START -->

  <div class="Content-Wrapper">
  
     <!-- TOPIC LIST START -->
     <div class="Topics-List-Block">
       



       <!-- SEPERATE TOPIC BLOCK START -->
       <?php
  $mysqli = new mysqli("localhost", "root", "", "ioii");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$id_wykl = $_SESSION["IDw"];
$query = "SELECT * FROM praca_dyplomowa  join wykladowca on wykladowca.Id_Wykladowcy=praca_dyplomowa.Id_Promotora where praca_dyplomowa.status='Do_recenzji' and praca_dyplomowa.Id_Promotora='$id_wykl'";

if (isset($_GET['recenzjap']) && isset($_GET['id'])){ 
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
       $sql = "UPDATE praca_dyplomowa SET Id_RecenzjaP='$last_id'  WHERE Id_Pracy='$idd'"; 
      $res = mysqli_query($mysqli, $sql);
      if ($res) {
      echo 'Rekord został dodany';
      $sql = "SELECT * FROM `praca_dyplomowa` p join recenzja r on p.Id_pracy=r.Id_Pracy WHERE p.Id_Pracy='$idd'"; 
      $res = mysqli_query($mysqli, $sql);
      $num_rows = mysql_num_rows($res);
      if($num_rows==2){
      	$row = $result->fetch_assoc();
 		$oc1=$row["Ocena"];
 		$row = $result->fetch_assoc(); 
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



if (isset($_GET['recenzjar']) && isset($_GET['id'])){ 
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
      $num_rows = mysql_num_rows($res);
      if($num_rows==2){
      	$row = $result->fetch_assoc();
 		$oc1=$row["Ocena"];
 		$row = $result->fetch_assoc(); 
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



if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
    	if($row['Id_RecenzjaP']==NULL)
        printf ( "

          <div class=\"Topic-Container\">
           
          <div class=\"Delete-Container\">
                <a href=\"#\"><img class=\"Cross\" src=\"../images/cross.png\" /></a>
          </div>

             <div class=\"Topic\">
             %s 
               
             </div>
               
             <!-- AUTHOR OF TOPIC -->
             <div class=\"Author\">
                <p class=\"static\">Autor:</p> 
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

             <div class=\"Plik\">
                <p class=\"static\">Plik pracy:</p>
               <a href=\"%s\">Otworzyc plik pracy</a>
             </div>
             
             <!-- ENTER INSIDE TOPIC DESCRIPTION -->
             <div class=\"Enter-Topic\">
               
               <a href=\"wykladowca.php?recenzjap=1&amp;id=" . $row["Id_Pracy"] . "\">  
                   Recenzja promotora  
               </a>
              
             </div>
         </div>\n", $row["Temat"], $row["Imie"], $row['Nazwisko'], $row["Opis"], $row["Status"], $row["Plik_Pracy"]);



    }

    /* free result set */
    $result->free();
}


   $query = "SELECT * FROM praca_dyplomowa  join wykladowca on wykladowca.Id_Wykladowcy=praca_dyplomowa.Id_Recenzenta where praca_dyplomowa.status='Do_Recenzji' and praca_dyplomowa.Id_Recenzenta='$id_wykl'";
 
if ($result = $mysqli->query($query)) {

   
    while ($row = $result->fetch_assoc()) {
    	if($row['Id_RecenzjaR']==NULL)
        printf ( "
          <div class=\"Show-Hide-Block\"> 
          <div class=\"Topic-Container\">
             
          <div class=\"Delete-Container\">
               <a href=\"#\"><img class=\"Cross\" src=\"../images/cross.png\" /></a>
          </div>

             <div class=\"Topic\">
             %s 
               
             </div>
               
             <!-- AUTHOR OF TOPIC -->
             <div class=\"Author\">
                <p class=\"static\">Autor:</p> 
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

             <div class=\"Plik\">
                <p class=\"static\">Plik pracy:</p>
               <a href=\"%s\">Otworzyc plik pracy</a>
             </div>

             
             <!-- ENTER INSIDE TOPIC DESCRIPTION -->
             <div class=\"Enter-Topic\">
               
               <a href=\"wykladowca.php?recenzjar=1&amp;id=" . $row["Id_Pracy"] . "\">  
                   Recenzja recenzenta 
               </a>
              </div>
             </div>
         </div>\n", $row["Temat"], $row["Imie"], $row['Nazwisko'], $row["Opis"], $row["Status"], $row["Plik_Pracy"]);
    }

    
    $result->free();
}

?>

     <!-- TOPIC LIST END -->

     <div class="Show-All-Topic">
           <img class="Arrow" src="../images/arrow.png" />
     </div>

  <div class="clearfix" style="clear:both"></div>
  </div>
  <!-- MAIN WRAPPER END -->
  