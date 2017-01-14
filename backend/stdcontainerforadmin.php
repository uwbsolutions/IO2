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
  $query = "SELECT * FROM praca_dyplomowa  join wykladowca on wykladowca.Id_Wykladowcy=praca_dyplomowa.Id_Promotora where praca_dyplomowa.status='Zatwierdzona'";

else
  $query = "SELECT pd.Plik_Pracy as Plik, pd.status as Status, pd.Temat as Temat, pd.Id_Pracy,w.Nazwisko as Nazwisko,w.Imie as Imie, pd.Opis as Opis, s.Nr_Albumu, pd.Id_Promotora  FROM `praca_dyplomowa` pd join student s on s.Id_Pracy = pd.Id_Pracy join wykladowca w on w.Id_Wykladowcy=pd.Id_Promotora where s.Nr_Albumu = '$ID'";
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
    
        if($row["Plik"]!=NULL){
           printf ("<div class=\"Plik_pracy\">
                <p class=\"static\">Plik pracy:</p>
                %s
             </div>", $row["Plik"]);
        }
        printf ("<!-- ENTER INSIDE TOPIC DESCRIPTION -->
             <div class=\"Enter-Topic\">
               
               <a href=\"#\">  
                   Wiecej  
               </a>

             </div>
             
         </div>\n");



    }

    /* free result set */
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
  