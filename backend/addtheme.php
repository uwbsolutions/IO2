<?php
require_once("header.php");
?>



  <!-- MAIN CONTENT WRAPPER START -->
  <div class="Content-Wrapper">
  
     <!-- REGISTER FORM START -->
      <form action='' id="theme" method="POST" class='Register-Form'>

        <div class="Form-Container">
        
        <div class="Read-Block">

          <label for="Temat">Temat</label>
          <textarea form="theme" name="Temat" cols="20" wrap="soft"></textarea> 

        </div>

        <div class="Read-Block">

          <label for="Opis">Opis</label>
          <textarea form="theme" name="Opis" cols="20" wrap="soft"></textarea> 

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
$conn = mysqli_connect("localhost", "root", "", "ioii");
  if (mysqli_connect_errno()) {
    echo 'Nie udało się połączyć z bazą danych: ' . mysqli_connect_error();
    exit();
  } 



/*if(isset($_POST['Temat'])){
    echo $_POST['Temat']." AAAA ". $_POST['Opis'];


  }
*/

if (isset($_POST['Temat'])) {

  
    $Temat = $_POST['Temat'];
    $Opis = $_POST['Opis'];
    $Status= "Zarejestrowana";

    $sql = "INSERT INTO praca_dyplomowa(Temat, Opis, Status, Id_Promotora) VALUES ('$Temat','$Opis','$Status') ";

    $res =mysqli_query($conn, $sql);

    

    if ($res) {

echo "Dodano";
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
  <!-- SCRIPTS END -->
</body>
</html>