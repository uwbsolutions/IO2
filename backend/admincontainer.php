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
$query = "SELECT * FROM praca_dyplomowa  join wykladowca on wykladowca.Id_Wykladowcy=praca_dyplomowa.Id_Promotora where praca_dyplomowa.status<>'Zarejestrowana'";


if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        printf ( "<div class=\"Topic-Container\">
             
          <div class=\"Delete-Container\">
                <img class=\"Cross\" src=\"../images/cross.png\" />
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
             <div class=\"Is-Taken\">
                <p class=\"static\">Opis:</p>
                %s
             </div>
             
             <!-- ENTER INSIDE TOPIC DESCRIPTION -->
             <div class=\"Enter-Topic\">
               
               <a href=\"#\">  
                   Wiecej  
               </a>

             </div>
             
         </div>\n", $row["Temat"], $row["Imie"], $row['Nazwisko'], $row["Opis"]);
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
  