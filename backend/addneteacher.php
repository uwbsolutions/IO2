<?php
require_once("headeradmin.php");
?>



  <!-- MAIN CONTENT WRAPPER START -->
  <div class="Content-Wrapper">
  
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
     <!-- REGISTER FORM END -->
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