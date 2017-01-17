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

if(isset($_GET['obrona'])&&isset($_GET['id'])){
    $idprc=$_GET['id'];
?>
<form action="" method="post">
          <input type="hidden" name="dodaj" value="1">
          <br>Ocena: <input type="text" name="Ocena">
          <br><br><input type="submit" value="Zapisz ocenę">
        </form>

<?php
if(isset($_POST['dodaj'])&&isset($_POST['Ocena'])){
    $ocena=$_POST['Ocena'];
    $query = "UPDATE obrona SET Ocena='$ocena' WHERE Id_pracy='$idprc'";    
    $res = mysqli_query($mysqli, $query);
      if ($res) {
      echo 'Rekord został zmodyfikowany';
      if($ocena>=3){
       
        $status='Obroniona';
      }
      else if($ocena<3)
        $status='Nieobroniona';

      $query = "UPDATE praca_dyplomowa SET Status='$status' WHERE Id_pracy='$idprc'";    
    $res = mysqli_query($mysqli, $query);
      header("location: Obronywykl.php");
    }
      else echo "Modyfikacja nie powiodła się: $sql<br>" .  mysqli_error($mysqli) . "<br><br>";   
    }

}



$query = "SELECT *,p.Imie as imiep,p.Nazwisko as nazwiskop, r.Imie as imier, r.Nazwisko as nazwiskor FROM praca_dyplomowa  join wykladowca p on p.Id_Wykladowcy=praca_dyplomowa.Id_Promotora join wykladowca r on r.Id_Wykladowcy=praca_dyplomowa.Id_Recenzenta join obrona on praca_dyplomowa.Id_Pracy=Obrona.Id_pracy where Obrona.Id_przewodniczacego='$Idw' and !ISNULL(obrona.Id_przewodniczacego) and !ISNULL(obrona.Data)";




if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        printf ( "

          <div class=\"Topic-Container\">
        

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
              <div class=\"Enter-Topic\">
             <a href=\"Obronywykl.php?obrona=1&amp;id=" . $row["Id_Pracy"] . "\">  
                   Dodaj ocene  
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