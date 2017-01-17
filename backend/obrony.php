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



if (isset($_GET['przewodniczac'])&&isset($_GET['id'])){ 
      $idd = $_GET['id'];
      $sql = "SELECT * FROM obrona WHERE Id_Pracy='$idd'"; 
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
	$idprc = $_GET['id'];
  $idprom=$_GET['idprom'];
  $idrec=$_GET['idrec'];
  $query = "SELECT * FROM wykladowca where Id_Wykladowcy<>'$idrec' and Id_Wykladowcy<>'$idprom'";
  $result = mysqli_query($mysqli, $query);

  ?>
<div class="Content-Wrapper">
  
     <!-- REGISTER FORM START -->
      <form action='' id="obr" method="POST" class='Register-Form'>

        <div class="Form-Container">
        
        <div class="Read-Block">

          <label for="Data">Data:</label>
          <input type="Data" name="data">
        </div>


        <div class="Read-Block">

    <label>Przewodniczacy: </label><select id="Przewodn" name="Przewodn"><br>
            <?php while($row1 = mysqli_fetch_array($result)):;?>



            <option  value="<?php echo $row1[0]   ; ?> " > 

            <?php echo $row1[5] . " " . $row1[3] . " " . $row1[4]  ; ?>

            </option>

          <?php endwhile;?>

          </select>

          <br>

     </div>

        <!-- Button -->
        <div class="Control">
          <button type = "submit" class="Reg-Btn">Register<i class="icon-chevron-right">
          </i>
          </button>
        </div>

        </div>

      </form>
      </div>
     <!-- REGISTER FORM END -->


  <?php
if (isset($_POST['Przewodn'])) {

  
    $przewodn = $_POST['Przewodn'];
    $data = $_POST['data'];

  $sql = "UPDATE obrona SET Data='$data', Id_przewodniczacego='$przewodn'  WHERE Id_Pracy='$idprc'"; 

    $res =mysqli_query($mysqli, $sql);

    

    if ($res) {

echo "Dodano";
 header("location: obrony.php");
    } 

    else {

      echo "<p class='check'>error</p>" . mysqli_error($mysqli);

    }

    mysqli_close($mysqli);

  }

}

$query = "SELECT *,p.Imie as imiep,p.Nazwisko as nazwiskop, r.Imie as imier, r.Nazwisko as nazwiskor FROM praca_dyplomowa  join wykladowca p on p.Id_Wykladowcy=praca_dyplomowa.Id_Promotora join wykladowca r on r.Id_Wykladowcy=praca_dyplomowa.Id_Recenzenta join obrona on praca_dyplomowa.Id_Pracy=Obrona.Id_pracy where praca_dyplomowa.status='Do_obrony' and ISNULL(Obrona.Data) and ISNULL(Obrona.Id_przewodniczacego)";
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
             
             <!-- ENTER INSIDE TOPIC DESCRIPTION -->
             <div class=\"Enter-Topic\">
               
               <a href=\"obrony.php?przewodniczacy=1&amp;id=" . $row["Id_Pracy"]  ."&amp;idprom=".$row['Id_Promotora']."&amp;idrec=".$row['Id_Recenzenta'].  "\">  
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