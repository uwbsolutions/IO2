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

$ID = $_SESSION['IDw'];
$querycheck = "SELECT * FROM student where Nr_Albumu = '$ID'";

if ($resultt = $mysqli->query($querycheck)) {
$rowcheck = $resultt->fetch_assoc();
$checking=$rowcheck['Id_Pracy'];

if($checking == NULL)
  $query = "SELECT *, Plik_Pracy as Plik FROM praca_dyplomowa  join wykladowca on wykladowca.Id_Wykladowcy=praca_dyplomowa.Id_Promotora where praca_dyplomowa.status='Zatwierdzona'";

else
  $query = "SELECT pd.Plik_Pracy as Plik, pd.status as Status, pd.Temat as Temat, pd.Id_Pracy,w.Nazwisko as Nazwisko,w.Imie as Imie, pd.Opis as Opis, s.Nr_Albumu, pd.Id_Promotora  FROM `praca_dyplomowa` pd join student s on s.Id_Pracy = pd.Id_Pracy join wykladowca w on w.Id_Wykladowcy=pd.Id_Promotora where s.Nr_Albumu = '$ID'";
}



if (isset($_GET['zrezygnuj']) && isset($_GET['id']) && $checking!=NULL){ 
      $idd = $_GET['id'];
// 2a. odczytujemy rekord, który ma być zmodyfikowany:      
      $sql = "UPDATE praca_dyplomowa SET Status='Zatwierdzona', Plik_Pracy=NULL  WHERE Id_Pracy='$idd'"; 
      $res = mysqli_query($mysqli, $sql);
      $sql = "UPDATE student SET Id_Pracy = NULL  WHERE Nr_Albumu='$ID'"; 
      $res = mysqli_query($mysqli, $sql);
      header("location: student.php");
}
else if (isset($_GET['wybierz']) && isset($_GET['id']) && $checking==NULL){ 
      $idd = $_GET['id'];
// 2a. odczytujemy rekord, który ma być zmodyfikowany:      
      $sql = "UPDATE praca_dyplomowa SET Status='Zarezerwowana'  WHERE Id_Pracy='$idd'"; 
      $res = mysqli_query($mysqli, $sql);
      $sql = "UPDATE student SET Id_Pracy = '$idd'  WHERE Nr_Albumu='$ID'"; 
      $res = mysqli_query($mysqli, $sql);
      header("location: student.php");
}

if (isset($_GET['dodaj']) && isset($_GET['id']) && $checking!=NULL){ 
      $idd = $_GET['id'];
      $sql = "SELECT Plik_Pracy FROM praca_dyplomowa WHERE Id_Pracy='$idd'"; 
      $res = mysqli_query($mysqli, $sql);
      if ($res){
        $tab = mysqli_fetch_array($res);
?>
<form action="" method="post">
<!-- 2d. dwa pola ukryte: -->
          <input type="hidden" name="dodaj" value="1">
          
<!-- 2b. Pola z aktualnymi wartościami rekordu, który będziemy zmieniać: -->
          <br>Odnosnik: <input type="text" name="odnosnik" value="<?php echo $tab[0]; ?>" >
          <br><br><input type="submit" value="Zapisz zmianę">
        </form>


<?php
}
  if (isset($_POST['dodaj']) && $_POST['odnosnik']!=NULL){ 
      
      $odnosnik = $_POST['odnosnik'];
     
      $sql = "UPDATE praca_dyplomowa SET Plik_Pracy='$odnosnik' ,Status = 'Do_recenzji' WHERE Id_Pracy ='$checking'";
      $res = mysqli_query($mysqli, $sql);
      if ($res) {
      echo 'Rekord został zmodyfikowany';
      header("location: student.php");
    }
      else echo "Modyfikacja nie powiodła się: $sql<br>" .  mysqli_error($mysqli) . "<br><br>";   
    }


    }



if ($result = $mysqli->query($query)) {
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        printf ( "<div class=\"Topic-Container\">
             
             <div class=\"Topic\">
             %s
               
             </div>
               
             <!-- AUTHOR OF TOPIC -->
             <div class=\"Author\">
                <p class=\"static\">Autor:</p> 
                %s %s
             </div>

             <!-- IS THE TOPIC TAKEN? IF SO - BY WHO? -->
             <div class=\"Is-Taken\">
                <p class=\"static\">Opis:</p>
                %s
             </div>

             <div class=\"Status\">
                <p class=\"static\">Status:</p>
                %s
             </div>
             
             ", $row["Temat"], $row["Imie"], $row['Nazwisko'], $row["Opis"], $row["Status"]);
    
        if($row["Plik"]!=NULL && $checking != NULL){
          printf ("<div class=\"Plik_pracy\">
              <p class=\"static\">Plik pracy:</p>
             <a target=\"_blank\" href=\"%s\">Otworz plik pracy</a>  |  <a href=\"student.php?dodaj=1&amp;id=" . $row["Id_Pracy"] . "\"> Zmodyfikuj odnosnik do pliku pracy </a>
             </div>", $row["Plik"]);
        }
        else if($row["Plik"]==NULL && $checking != NULL){
          printf ("<div class=\"Plik_pracy\">
              <p class=\"static\">Plik pracy:</p>
              <a href=\"student.php?dodaj=1&amp;id=" . $row["Id_Pracy"] . "\"> Dodaj odnosnik do pliku pracy </a>
             </div>");

        }


        if($checking != NULL){
        printf ("<!-- ENTER INSIDE TOPIC DESCRIPTION -->
             <div class=\"Enter-Topic\">
               
              <a href=\"student.php?zrezygnuj=1&amp;id=" . $row["Id_Pracy"] . "\">Zrezygnuj</a>
                   

             </div>
             
         </div>\n");




      }
      else
        printf ("<!-- ENTER INSIDE TOPIC DESCRIPTION -->
             <div class=\"Enter-Topic\">
               
               <a href=\"student.php?wybierz=1&amp;id=" . $row["Id_Pracy"] . "\">Wybierz</a>

             </div>
             
         </div>\n");



    }

    /* free result set */
    $result->free();
}

   
?>

     <!-- TOPIC LIST END -->

     
  <div class="clearfix" style="clear:both"></div>
  </div>
  <!-- MAIN WRAPPER END -->
  