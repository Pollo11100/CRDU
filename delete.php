	<!DOCTYPE html>
	<html>

		<head>
			<link rel="stylesheet" href="../style.css">
		</head>

		<body>

			<?php      
				require_once("../connection.php");
				//session_start();
				if(!isset($_SESSION['username'])){
					header('location: ../controller/index.php');
				}

				$canc = "SELECT * FROM clients WHERE id = " . $_GET["id"];
				$result = mysqli_query($conn, $canc);

				echo "<table>";
				if (mysqli_num_rows($result) > 0) {
					
					while($row = mysqli_fetch_assoc($result)) {

						echo '<tr>';
						foreach ($row as $data) {
							echo "<td>".$data."</td>";
						}
					
					}
				} 
				echo "</table>";
				
			
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					if (isset($_GET['id'])) {
						$sql = "DELETE FROM clients WHERE id = " . $_GET["id"];

						if (mysqli_query($conn, $sql)) {
							header("location: ../menu.php");  
							
						} else {
							echo "Error deleting record: " . mysqli_error($conn);
							
						}
						
					}
				}
				mysqli_close($conn);
				
			?>

			<form method="POST">
				<button type = "submit" name = "delete">Delete</button> <br>
			</form>

			<a href="../menu.php">
				<button type="submit" name="anulla">Anulla</button>
			</a>
			

		</body>
	</html>