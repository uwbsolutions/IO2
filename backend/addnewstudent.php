<?php
require_once("headeradmin.php");
?>



  <!-- MAIN CONTENT WRAPPER START -->
  <div class="Content-Wrapper">
  
     <!-- REGISTER FORM START -->
      <form action='' method="POST" class='Register-Form'>

        <div class="Form-Container">
        
        <div class="Read-Block">

          <label for="name">Nr albumu</label>
          <input type="text" id="nr_albumu" name="nr_akbumu" placeholder="" class="Input-Field">

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
     <!-- REGISTER FORM END -->
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



    $sql = "INSERT INTO student(nr_albumu,imie,nazwisko,login,haslo) VALUES ('$nr_albumu','$imie_stud','$nazw_stud','$log_stud','$hasl_stud') ";

    $res =mysqli_query($conn, $sql);

    

    if ($res) {


    } 

    else {

      echo "<p class='check'>error</p>" . mysqli_error($conn);

    }

    mysqli_close($conn);

  }




?>



  <div class="clearfix" style="clear:both"></div>
  </div>
  <!-- MAIN WRAPPER END -->
  
  <!-- FOOTER START -->
  <div class="Footer-Wrapper">

    <footer>

      copyrights
      
    </footer>

  </div>
  <!-- FOOTER END -->
  
  <!-- SCRIPTS START -->
  <script src="js/jquery-3.1.1.js"></script>
  <script src="js/show_more_topics.js"></script>
  <script src="js/_show_hide_delete.js"></script>
  <!-- SCRIPTS END -->
</body>
</html>