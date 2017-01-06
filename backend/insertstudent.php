<?php
require_once("header.php");
?>


<form class="input" action="insertstudent.php" method="post" class="input" >
	Nr albumu:<br>

	<input class='singup' type="text" name="nr_albumu"><br>

	Imie studenta:<br>

	<input class='singup' type="text" name="imie_stud"><br>

	Nazwisko studenta:<br>

	 <input class='singup' type="text" name="nazw_stud"><br>

	Login studenta: <br>

	<input class='singup' type="text" name="log_stud"><br>

	Haslo studenta:<br>

	 <input class='singup' type="text" name="hasl_stud"><br>


	<button class='singup' type='submit'>Dodaj studenta </button>

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
