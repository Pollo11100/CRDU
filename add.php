<?php      
	require_once("../connection.php");
	if(!isset($_SESSION['username'])){
		header('location: ../controller/index.php');
	}

	$firstname = "";
	$lastname = "";
	$email = "";

	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];

		$name=false;
		if(!empty($_POST['firstname'])){
			$name=true;
		}

		$cogome=false;
		if(!empty($_POST['lastname'])){
			$cognome=true;
		} 

		$em = true;
		if(!empty($_POST['email'])){
			if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$em = true;
			}else{
				$em= false;
			}
		}
			
		if($name==true && $cognome==true && $em==true){

			$nome = strtolower($_POST['firstname']);
			$cognome  = strtolower($_POST['lastname']);


			$sqlInsertData = "INSERT INTO clients (firstname, lastname, email) VALUES ('$nome', '$cognome', '$email')";
			if (mysqli_query($conn, $sqlInsertData)) {
				header("location: ../menu.php"); 
			} else {
				echo "Error: ".$sqlInsertData."<br>";
				mysqli_error($conn);
			}  
		}else{
			
		}

		
	}

	/*$sqlReadData = "SELECT * FROM clients";
	$result = mysqli_query($conn, $sqlReadData);
		
	echo "<table>";
	if (mysqli_num_rows($result) > 0) {
		
		while($row = mysqli_fetch_assoc($result)) {

			echo '<tr>';
			foreach ($row as $data) {
				echo "<td>".$data."</td>";
			}
			echo "<td><a href = 'delete.php?id=".$row['id']."'>Delete</a></td>";
			echo "<td><a href = 'edit.php?id= ".$row["id"]."&"."firstname= ".$row["firstname"]."&"."lastname= ".$row["lastname"]."&"."email= ".$row["email"]."'>Edit</a></td>";
			echo "</tr>";
		}
	} else {
		echo "0 results";
	}
	echo "</table>";*/

	mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

	<head>
		<link rel="stylesheet" href="../style.css">
	</head>

    <body>
		
		<nav class="navMenu">
			<form  method = "post">
				<label>Nome: </label>
				<input type = "text" name = "firstname" id="ciao"> <br>

				<label>Cognome: </label>
				<input type = "text" name = "lastname" id="ciao"> <br>

				<label>Email: </label>
				<input type = "text" name = "email" id="ciao"> <br>

				<button type = "submit" name = "insertData">Submit</button>
				
				<a href="../menu.php">Back</a>
			
			</form>
		</nav>
       
      

       
    </body>
</html>