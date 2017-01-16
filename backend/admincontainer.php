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
$query = "SELECT *,p.Imie as imiep,p.Nazwisko as nazwiskop, r.Imie as imier, r.Nazwisko as nazwiskor FROM praca_dyplomowa  join wykladowca p on p.Id_Wykladowcy=praca_dyplomowa.Id_Promotora join wykladowca r on r.Id_Wykladowcy=praca_dyplomowa.Id_Recenzenta where praca_dyplomowa.status='Zarejestrowana'";

if(isset($_GET['podtwierdz'])&&isset($_GET['id'])){
  $idprc=$_GET['id'];
  $sql = "UPDATE praca_dyplomowa SET Status = 'Zatwierdzona' WHERE Id_Pracy ='$idprc'";
      $res = mysqli_query($mysqli, $sql);
      if ($res) {
      echo 'Rekord został zmodyfikowany';
      header("location: admin.php");
    }
      else echo "Modyfikacja nie powiodła się: $sql<br>" .  mysqli_error($mysqli) . "<br><br>";   
    }

    if(isset($_GET['usun'])&&isset($_GET['id'])){
  $idprc=$_GET['id'];
  $sql = "DELETE FROM praca_dyplomowa WHERE Id_Pracy ='$idprc'";
      $res = mysqli_query($mysqli, $sql);
      if ($res) {
      echo 'Deleted';
      header("location: admin.php");
    }
      else echo "Usuwanie nie powiodło się: $sql<br>" .  mysqli_error($mysqli) . "<br><br>";   
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
               
               <a href=\"admin.php?podtwierdz=1&amp;id=" . $row["Id_Pracy"] . "\">  
                   Zatwierdz temat  
               </a>
              
             </div>
         </div>\n",  $row["Temat"], $row["imiep"], $row['nazwiskop'], $row["imier"], $row['nazwiskor'], $row["Opis"], $row["Status"]);
    }

    /* free result set */
    $result->free();
}


   $query = "SELECT *,p.Imie as imiep,p.Nazwisko as nazwiskop, r.Imie as imier, r.Nazwisko as nazwiskor FROM praca_dyplomowa  join wykladowca p on p.Id_Wykladowcy=praca_dyplomowa.Id_Promotora join wykladowca r on r.Id_Wykladowcy=praca_dyplomowa.Id_Recenzenta where praca_dyplomowa.status<>'Zarejestrowana'";


if ($result = $mysqli->query($query)) {

   
    while ($row = $result->fetch_assoc()) {
        printf ( "
          <div class=\"Show-Hide-Block\"> 
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
             
             </div>
         </div>\n", $row["Temat"], $row["imiep"], $row['nazwiskop'], $row["imier"], $row['nazwiskor'], $row["Opis"], $row["Status"]);
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
  