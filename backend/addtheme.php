<?php
require_once("headerwykl.php");
session_start();
$idwykl=$_SESSION["IDw"];
$conn = mysqli_connect("localhost", "root", "", "ioii");
  if (mysqli_connect_errno()) {
    echo 'Nie udało się połączyć z bazą danych: ' . mysqli_connect_error();
    exit();
  } 

$query = "SELECT * FROM wykladowca WHERE Id_Wykladowcy<>'$idwykl'";
$result = mysqli_query($conn, $query);

?>



  <!-- MAIN CONTENT WRAPPER START -->
  <div class="Content-Wrapper">
  
     <!-- REGISTER FORM START -->
      <form action='' id="theme" method="POST" class='Register-Form'>

        <div class="Form-Container">
        
        <div class="Read-Block">

          <label for="Temat">Temat</label>
          <textarea form="theme" name="Temat" cols="70" rows="5" wrap="soft"></textarea> 

        </div>
         <div class="Read-Block">

          <label for="Opis">Opis</label>
          <textarea form="theme" name="Opis" cols="70" rows="5" wrap="soft"></textarea> 

        </div>


        <div class="Read-Block">

    <label>Recenzent: </label><select id="Recenzent" name="Recenzent"><br>
            <?php while($row1 = mysqli_fetch_array($result)):;?>



            <option  value="<?php echo $row1[0]   ; ?> " > 

            <?php echo $row1[5] . " " . $row1[3] . " " . $row1[4]  ; ?>

            </option>

          <?php endwhile;?>

          </select>

          <br>

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




/*if(isset($_POST['Temat'])){
    echo $_POST['Temat']." AAAA ". $_POST['Opis'];


  }
*/

if (isset($_POST['Temat'])) {

  
    $Temat = $_POST['Temat'];
    $Opis = $_POST['Opis'];
    $Status= "Zarejestrowana";
    $idrecenz = $_POST['Recenzent'];

    $sql = "INSERT INTO praca_dyplomowa(Temat, Opis, Status, Id_Promotora,Id_Recenzenta) VALUES ('$Temat','$Opis','$Status','$idwykl','$idrecenz') ";

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