<?php
include('session.php');

if($user_check=='admin'){

require_once("headeradmin.php");


?>
<a href="Zarzadzaj.php?wwykl=1">Wyswietl Wykładowców</a> 
<a href="Zarzadzaj.php?wstd=1">Wyswietl Studentów</a> 

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



if (isset($_GET['redagujs']) && isset($_GET['id'])){ 
      $idd = $_GET['id'];
      $sql = "SELECT * FROM student WHERE Nr_Albumu='$idd'"; 
      $res = mysqli_query($mysqli, $sql);
      if ($res){
        $tab = mysqli_fetch_array($res);
?>
<form action="" method="post">
<!-- 2d. dwa pola ukryte: -->
          <input type="hidden" name="hid" value="1">
          
<!-- 2b. Pola z aktualnymi wartościami rekordu, który będziemy zmieniać: -->
          <br>Imie: <input type="text" name="Imie" value="<?php echo $tab['Imie']; ?>" >
          <br>Nazwisko: <input type="text" name="Nazwisko" value="<?php echo $tab['Nazwisko']; ?>" >
          <br>Login: <input type="text" name="Login" value="<?php echo $tab['Login']; ?>" >
          <br>Numer albumu: <input type="text" name="Nr_Albumu" value="<?php echo $tab['Nr_Albumu']; ?>" >

          <br><br><input type="submit" value="Zapisz zmianę">
        </form>


<?php
}
  if (isset($_POST['Nr_Albumu'])&&$_POST['hid']){ 
      
      $Imie = $_POST['Imie'];
      $Nr_Albumu = $_POST['Nr_Albumu'];
      $Nazwisko = $_POST['Nazwisko'];
      $Login = $_POST['Login'];
     
      $sql = "UPDATE student SET Imie='$Imie' ,Nr_Albumu = '$Nr_Albumu', Nazwisko='$Nazwisko',Login='$Login' WHERE Nr_Albumu='$idd'";
      $res = mysqli_query($mysqli, $sql);
      if ($res) {
      echo 'Rekord został zmodyfikowany';
      header("location: Zarzadzaj.php?wstd=1");
    }
      else echo "Modyfikacja nie powiodła się: $sql<br>" .  mysqli_error($mysqli) . "<br><br>";   
    }


    }


if (isset($_GET['redagujw']) && isset($_GET['id'])){ 
      $idd = $_GET['id'];
      $sql = "SELECT * FROM wykladowca WHERE Id_Wykladowcy='$idd'"; 
      $res = mysqli_query($mysqli, $sql);
      if ($res){
        $tab = mysqli_fetch_array($res);
?>
<form action="" method="post">
<!-- 2d. dwa pola ukryte: -->
          <input type="hidden" name="hid" value="1">
          
<!-- 2b. Pola z aktualnymi wartościami rekordu, który będziemy zmieniać: -->
          <br>Imie: <input type="text" name="Imie" value="<?php echo $tab['Imie']; ?>" >
          <br>Nazwisko: <input type="text" name="Nazwisko" value="<?php echo $tab['Nazwisko']; ?>" >
          <br>Login: <input type="text" name="Login" value="<?php echo $tab['Login']; ?>" >
          <br>Tytul naukowy: <input type="text" name="Tytul_Naukowy" value="<?php echo $tab['Tytul_Naukowy']; ?>" >

          <br><br><input type="submit" value="Zapisz zmianę">
        </form>


<?php
}
  if (isset($_POST['Login'])&&$_POST['hid']){ 
      
      $Imie = $_POST['Imie'];
      $Tytul_Naukowy = $_POST['Tytul_Naukowy'];
      $Nazwisko = $_POST['Nazwisko'];
      $Login = $_POST['Login'];
     
      $sql = "UPDATE wykladowca SET Imie='$Imie' ,Tytul_Naukowy = '$Tytul_Naukowy', Nazwisko='$Nazwisko',Login='$Login' WHERE Id_Wykladowcy='$idd'";
      $res = mysqli_query($mysqli, $sql);
      if ($res) {
      echo 'Rekord został zmodyfikowany';
      header("location: Zarzadzaj.php?wwykl=1");
    }
      else echo "Modyfikacja nie powiodła się: $sql<br>" .  mysqli_error($mysqli) . "<br><br>";   
    }


    }

if(isset($_GET['usuns'])&&isset($_GET['id'])){
  $idstd=$_GET['id'];
  $sql = "DELETE FROM student WHERE Nr_Albumu ='$idstd'";
      $res = mysqli_query($mysqli, $sql);
      if ($res) {
      echo 'Deleted';
      header("location: Zarzadzaj.php?wstd=1");
    }
      else echo "Usuwanie nie powiodło się: $sql<br>" .  mysqli_error($mysqli) . "<br><br>";   
    }


    if(isset($_GET['usunw'])&&isset($_GET['id'])){
  $idwykl=$_GET['id'];
  $sql = "DELETE FROM wykladowca WHERE Id_Wykladowcy ='$idwykl'";
      $res = mysqli_query($mysqli, $sql);
      if ($res) {
      echo 'Deleted';
      header("location: Zarzadzaj.php?wwykl=1");
    }
      else echo "Usuwanie nie powiodło się: $sql<br>" .  mysqli_error($mysqli) . "<br><br>";   
    }



if(isset($_GET['wwykl'])){

$query = "SELECT * from wykladowca";
if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        printf ( "

          <div class=\"Topic-Container\">
           
          <div class=\"Delete-Container\">
                <a href=\"Zarzadzaj.php?usunw=1&amp;id=" . $row["Id_Wykladowcy"] . "\"><img class=\"Cross\" src=\"../images/cross.png\" /></a>
          </div>

             <div class=\"Topic\">
             %s %s
               
             </div>
               
             <!-- AUTHOR OF TOPIC -->
             <div class=\"Author\">
                <p class=\"static\">Tytul naukowy:</p> 
                %s
             </div>
             <div class=\"Author\">
                <p class=\"static\">Login:</p> 
                %s
             </div>

             <div class=\"Enter-Topic\">
               
               <a href=\"Zarzadzaj.php?redagujw=1&amp;id=" . $row["Id_Wykladowcy"] . "\">  
                   Redaguj
               </a>
              
             </div>
         </div>\n",  $row["Imie"], $row["Nazwisko"], $row['Tytul_Naukowy'], $row["Login"]);
    }

    /* free result set */
    $result->free();
}

}
else if(isset($_GET['wstd'])){
$query = "SELECT * from student";
if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        printf ( "

          <div class=\"Topic-Container\">
           
          <div class=\"Delete-Container\">
                <a href=\"Zarzadzaj.php?usuns=1&amp;id=" . $row["Nr_Albumu"] . "\"><img class=\"Cross\" src=\"../images/cross.png\" /></a>
          </div>

             <div class=\"Topic\">
             %s %s
               
             </div>
               
             <!-- AUTHOR OF TOPIC -->
             <div class=\"Author\">
                <p class=\"static\">Nr albumu:</p> 
                %s
             </div>
             <div class=\"Author\">
                <p class=\"static\">Login:</p> 
                %s
             </div>

             <div class=\"Enter-Topic\">
               
               <a href=\"Zarzadzaj.php?redagujs=1&amp;id=" . $row["Nr_Albumu"] . "\">  
                   Redaguj
               </a>
              
             </div>
         </div>\n",  $row["Imie"], $row["Nazwisko"], $row['Nr_Albumu'], $row["Login"]);
    }

    /* free result set */
    $result->free();
}

}

/*

*/



?>
<?php
require_once("footer.php");
}
else 
  echo "Nie masz dostepu do tej strony ". "<a href='../index.php'>Homepage</a>";


?>
<b id="logout"><a href="logout.php">Log Out</a></b>


  </div>
  
  