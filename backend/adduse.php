<?php
include('session.php');

if($user_check=='admin'){

require_once("headeradmin.php");

if(isset($_GET['addwykl'])){


?>
 <div class="Content-Wrapper">
  
  <div class="Ad_menu">
    <a href="adduse.php?addwykl=1">Dodaj Wykładowcę</a> 
    <a href="adduse.php?addstd=1">Dodaj Studenta</a> 
  </div>
     <!-- REGISTER FORM START -->
      <form action='' method="POST" class='Register-Form'>

        <div class="Form-Container">
        
       

        <div class="Read-Block">

          <label for="name">Imie wykladowcy</label>
          <input type="text" id="name" name="imie_wykl" placeholder="" class="Input-Field">

        </div>
        <div class="Read-Block">
          
          <label for="surname">Nazwisko wykladowcy</label>
          <input type="text" id="surname" name="nazw_wykl" placeholder="" class="Input-Field">

        </div>
        <div class="Read-Block">
          
          <label for="Login">Login wykladowcy</label>
          <input type="text" id="login" name="log_wykl" placeholder="" class="Input-Field">

        </div>
        <div class="Read-Block">
          
          <label for="Haslo">Haslo wykladowcy</label>
          <input type="password" id="Haslo" name="hasl_wykl" placeholder="" class="Input-Field">

        </div>
         <div class="Read-Block">
          
          <label for="Tytul">Tytul naukowy wykladowcy</label>
          <input type="Tytul" id="Haslo" name="Tytul_wykl" placeholder="" class="Input-Field">

        </div>

        <!-- Button -->
        <div class="Control">
          <button type = "submit" class="Reg-Btn">Register<i class="icon-chevron-right">
          </i>
          </button>
        </div>

        </div>

      </form>
<?php

$conn = mysqli_connect("localhost", "root", "", "ioii");
  if (mysqli_connect_errno()) {
    echo 'Nie udało się połączyć z bazą danych: ' . mysqli_connect_error();
    exit();
  } 
if (isset($_POST['log_wykl'])) {

  
    
    $imie_wykl = $_POST['imie_wykl'];

    $nazw_wykl = $_POST['nazw_wykl'];

    $log_wykl = $_POST['log_wykl'];

    $hasl_wykl = $_POST['hasl_wykl'];
    $Tytul_wykl = $_POST['Tytul_wykl'];



    $sql = "INSERT INTO wykladowca(Imie,Nazwisko,Login,Haslo,Tytul_Naukowy) VALUES ('$imie_wykl','$nazw_wykl','$log_wykl','$hasl_wykl', '$Tytul_wykl') ";

    $res =mysqli_query($conn, $sql);

    

    if ($res) {


    } 

    else {

      echo "<p class='check'>error</p>" . mysqli_error($conn);

    }

    mysqli_close($conn);

  }

}

else if(isset($_GET['addstd'])){
?>
<div class="Content-Wrapper">
  
     <!-- REGISTER FORM START -->
      <form action='' method="POST" class='Register-Form'>

        <div class="Form-Container">
        
        <div class="Read-Block">

          <label for="name">Nr albumu</label>
          <input type="text" id="nr_albumu" name="nr_albumu" placeholder="" class="Input-Field">

        </div>

        <div class="Read-Block">

          <label for="name">Imie studenta</label>
          <input type="text" id="name" name="imie_stud" placeholder="" class="Input-Field">

        </div>
        <div class="Read-Block">
          
          <label for="surname">Nazwisko studenta</label>
          <input type="text" id="surname" name="nazw_stud" placeholder="" class="Input-Field">

        </div>
        <div class="Read-Block">
          
          <label for="Login">Login studenta</label>
          <input type="text" id="login" name="log_stud" placeholder="" class="Input-Field">

        </div>
        <div class="Read-Block">
          
          <label for="Haslo">Haslo studenta</label>
          <input type="password" id="Haslo" name="hasl_stud" placeholder="" class="Input-Field">

        </div>

        <!-- Button -->
        <div class="Control">
          <button type = "submit" class="Reg-Btn">Register<i class="icon-chevron-right">
          </i>
          </button>
        </div>

        </div>

      </form>

<?php
$conn = mysqli_connect("localhost", "root", "", "ioii");
  if (mysqli_connect_errno()) {
    echo 'Nie udało się połączyć z bazą danych: ' . mysqli_connect_error();
    exit();
  } 
if (isset($_POST['log_stud'])) {

  
    $nr_albumu = $_POST['nr_albumu'];
    $imie_stud = $_POST['imie_stud'];

    $nazw_stud = $_POST['nazw_stud'];

    $log_stud = $_POST['log_stud'];

    $hasl_stud = $_POST['hasl_stud'];



    $sql = "INSERT INTO student(Nr_Albumu,Imie,Nazwisko,Login,Haslo) VALUES ('$nr_albumu','$imie_stud','$nazw_stud','$log_stud','$hasl_stud') ";

    $res =mysqli_query($conn, $sql);

    

    if ($res) {


    } 

    else {

      echo "<p class='check'>error</p>" . mysqli_error($conn);

    }

    mysqli_close($conn);

  }
}

?>








<?php

require_once("footer.php");
}
else 
	echo "Nie masz dostepu do tej strony ". "<a href='../index.php'>Homepage</a>";


?>
<b id="logout"><a href="logout.php">Log Out</a></b>